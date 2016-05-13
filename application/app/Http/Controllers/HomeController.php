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

		if(\SSO\SSO::check()){
			$userNPM = session()->get('npm');
			$userFaculty = substr(session()->get('org_code'),-5,2); //mengambil kode fakultas user
			//mengambil semua form yang memiliki filter fakultas yang sama dengan kode fakultas user
			$forms = DB::table('form')->join('filter', 'form.ID', '=', 'filter.form_ID')->where([['filter.type','=','Faculty'],['filter.name','=',$userFaculty]])->orderBy('Time_Stamp', 'desc')->distinct()->get();
			
			//mengambil semua form yang telah diisi oleh user
			$formygudhdiisi = DB::table('answer')->select('form.ID')->join('question', 'answer.question_ID', '=', 'question.ID')->join('form','question.form_ID','=','form.ID')->where('answer.NPM','=',$userNPM)->distinct()->lists('form.ID');;
			
			
			
			return view('index', ['forms' => $forms,'json'=>$userFaculty, 'terisi'=> $formygudhdiisi]); //redirect ke halaman view
		}
		else{
			return \Redirect::intended("/login");  //jika belum terautentikasi oleh SSO          
		}
	}
	
	public function getResponses()
	{
		if(\SSO\SSO::authenticate()){
			$userNPM = session()->get('npm');
			$userFaculty = substr(session()->get('org_code'),-5,2); //mengambil kode fakultas user

			$resp_forms = DB::table('form')->select('answer.NPM', 'form.ID', 'form.Title', 'Description', 'TargetNumber', 'FilledNumber', 'QNumber', 'Reward', 'answer.Time_Stamp', 'form_ID', 'Type')->join('question', 'form.ID', '=', 'question.form_ID')->join('answer','question.ID','=','answer.question_ID')->where('answer.NPM','=',$userNPM)->orderBy('Time_Stamp')->distinct()->get();
			
			return view('my-responses', ['resp_forms' => $resp_forms]);
		}
	}

	public function addCoin(Request $request){
		if(\SSO\SSO::authenticate()){
			DB::table('coin_request')->insert([
				['NPM' => session()->get('npm'), 'Type' => 'add', 'QNumber' => $request->qnumber]
					]);
			//redirect menuju page home dan menampilkan pesan sukses.
			return \Redirect::intended("/home")->with('alert-success','Anda berhasil melakukan request add coin.');
		}
	}

	public function redeemCoin(Request $request){ //untuk melakukan request redeem coin
		if(\SSO\SSO::authenticate()){ //cek apakah user terautentikasi
			$saldo = DB::table('users')->where('NPM','=',session()->get('npm'))->first()->coin; //mengambil saldo user
			if($request->qnumber <= $saldo && $request->qnumber > 0){
				DB::table('coin_request')->insert([
						['NPM' => session()->get('npm'), 'Type' => 'redeem', 'QNumber' => $request->qnumber]
					]);
				//redirect menuju page /home dan menampilkan pesan sukses.
				return \Redirect::intended("/home")->with('alert-success','Anda berhasil melakukan redeem coin.');
			}
			else{
				//redirect menuju page /home dan menampilkan pesan gagal.
				return \Redirect::intended("/home")->with('alert','Coin anda tidak valid atau tidak mencukupi untuk melakukan redeem coin.');
			}
		}
	}
	
	public function coinRequest(){ //untuk menampilkan page coin-request (untuk admin)
		if(\SSO\SSO::authenticate()){
			if (session()->get('role')=="admin") {
				$requests = DB::table('coin_request')->get(); //mengambil semua data dari database table coin_request 
				return view('coin-requests', ['requests' => $requests]); //menampilkan page coin-request (untuk admin), dengan memberi data request semua user
			}
			else{
            	return view('denied');
			}
		}
	}
	
	public function approveReq($reqID) //untuk mengubah status request menjadi approve serta memberikan efek yang sesuai
    {
    	if(\SSO\SSO::authenticate()){
    		//mengambil request yang memiliki ID $reqID
			$request = DB::table('coin_request')->where('ID','=',$reqID)->first();
			if($request->type =='add') //jika request merupakan add, maka coin user tersebut akan bertambah sesuai request
			{
			DB::table('users')->where('NPM','=',$request->NPM)->increment('coin', $request->QNumber);
			}
			elseif ($request->type == 'redeem') //jika request merupakan redeem, maka coin user tersebut akan berkurang sesuai request
			{
			DB::table('users')->where('NPM','=',$request->NPM)->decrement('coin', $request->QNumber);
			}
			
			//update status sebuah request $request menjadi approved
			DB::table('coin_request')->where('ID', '=', $reqID)->update(['status' => 'approved']);
			
			//redirect menuju page coin-requests dan menampilkan pesan sukses.
			return \Redirect::intended("/coin-requests")->with('alert-success','Anda berhasil melakukan approval coin request.');;
    	}
	}
}
