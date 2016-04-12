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
				{	
					$userFaculty = substr(session()->get('org_code'),-5,2); //mengambil kode fakultas user
					//mengambil semua form yang memiliki filter fakultas yang sama dengan kode fakultas user
					$forms = DB::table('form')->join('filter', 'form.ID', '=', 'filter.form_ID')->where([['filter.type','=','Faculty'],['filter.name','=',$userFaculty],])->orderBy('Time_Stamp', 'desc')->distinct()->get();
					return view('index', ['forms' => $forms,'json'=>$userFaculty]); //redirect ke halaman view
				}
				else{ //jika email user tidak ada
					return \Redirect::intended("/register");//redirect ke controller register
				}    
			}
			else return \Redirect::intended("/login");  //jika belum terautentikasi oleh SSO          
        }

		
	}
	
}
