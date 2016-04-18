<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;

date_default_timezone_set('Asia/Jakarta');

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function index()
	{
		/* untuk pengambilan json
		$path = storage_path() . "\additional-info.json";
		$file=File::get($path);
		$json = json_decode($file,true);
		$json2 = $json['04.00.01.01'];
		$json3 = $json2['faculty'];
		*/
		if(\SSO\SSO::authenticate()){ //jika telah terautentikasi oleh SSO
			$SSO = \SSO\SSO::getUser();
			$user = \App\User::where("npm", "=", $SSO->npm)->first(); //mengambil row database user dengan npm = $SSO->npm
			if($user){ //jika user ada
				if($user->email) //jika email user ada
				{	$userNPM = session()->get('npm');
					$userFaculty = substr(session()->get('org_code'),-5,2); //mengambil kode fakultas user
					//mengambil semua form yang memiliki filter fakultas yang sama dengan kode fakultas user
					$forms = DB::table('form')->join('filter', 'form.ID', '=', 'filter.form_ID')->where([['filter.type','=','Faculty'],['filter.name','=',$userFaculty]])->orderBy('Time_Stamp', 'desc')->distinct()->get();
					
					//mengambil semua form yang telah diisi oleh user
					$formygudhdiisi = DB::table('answer')->select('form.ID')->join('question', 'answer.question_ID', '=', 'question.ID')->join('form','question.form_ID','=','form.ID')->where('answer.NPM','=',$userNPM)->distinct()->lists('form.ID');;
					
					//mengambil semua log request yang telah diisi oleh user dan coin user
					$coinreqs = DB::table('coin_request')->where('NPM','=',session()->get('npm'))->get();
					$userdata = DB::table('users')->where('NPM','=',session()->get('npm'))->first();
					
					return view('index', ['forms' => $forms,'json'=>$userFaculty, 'terisi'=> $formygudhdiisi, 'coinreqs'=>$coinreqs, 'user_coin'=>$userdata->coin]); //redirect ke halaman view
				}
				else{ //jika email user tidak ada
					return \Redirect::intended("/register");//redirect ke controller register
				}    
			}
			else return \Redirect::intended("/login");  //jika belum terautentikasi oleh SSO          
        }

		
	}
	
	public function getResponses()
	{
		$userNPM = session()->get('npm');
		$userFaculty = substr(session()->get('org_code'),-5,2); //mengambil kode fakultas user

		$resp_forms = DB::table('form')->select('answer.NPM', 'form.ID', 'form.Title', 'Description', 'TargetNumber', 'FilledNumber', 'QNumber', 'Reward', 'answer.Time_Stamp', 'form_ID', 'Type')->join('question', 'form.ID', '=', 'question.form_ID')->join('answer','question.ID','=','answer.question_ID')->where('answer.NPM','=',$userNPM)->orderBy('Time_Stamp')->distinct()->get();
		//mengambil semua log request yang telah diisi oleh user dan coin user
					$coinreqs = DB::table('coin_request')->where('NPM','=',session()->get('npm'))->get();
					$userdata = DB::table('users')->where('NPM','=',session()->get('npm'))->first();
		return view('my-responses', ['resp_forms' => $resp_forms,'coinreqs'=>$coinreqs, 'user_coin'=>$userdata->coin]);
	}

	public function addCoin(Request $request){
		DB::table('coin_request')->insert([
						['NPM' => session()->get('npm'), 'Type' => 'add', 'QNumber' => $request->qnumber]
					]);
		return \Redirect::intended("/home");
	}

	public function redeemCoin(Request $request){
		DB::table('coin_request')->insert([
						['NPM' => session()->get('npm'), 'Type' => 'redeem', 'QNumber' => $request->qnumber]
					]);
		return \Redirect::intended("/home");
	}
	
	public function coinRequest(){
		$requests = DB::table('coin_request')->get();
		//mengambil semua log request yang telah diisi oleh user dan coin user
					$coinreqs = DB::table('coin_request')->where('NPM','=',session()->get('npm'))->get();
					$userdata = DB::table('users')->where('NPM','=',session()->get('npm'))->first();
		return view('coin-requests', ['requests' => $requests,'coinreqs' => $coinreqs, 'user_coin' => $userdata->coin]);
		//return \Redirect::intended("/home");
	}
	
	public function approveReq($reqID) //untuk mengisi sebuah form
    {
		//mengambil request yang memiliki ID $reqID
		$request = DB::table('coin_request')->where('ID','=',$reqID)->first();
		if($request->type =='add')
		{
		DB::table('users')->where('NPM','=',$request->NPM)->increment('coin', $request->QNumber);
		}
		elseif ($request->type == 'redeem')
		{
		DB::table('users')->where('NPM','=',$request->NPM)->decrement('coin', $request->QNumber);
		}
		
		//update status sebuah request $request menjadi approved
		DB::table('coin_request')->where('ID', '=', $reqID)->update(['status' => 'approved']);
		
		return \Redirect::intended("/coinrequest");
	}
}
