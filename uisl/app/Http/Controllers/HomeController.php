<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

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
		return view('index');
	}
	
	public function registration()
	{	
		$error = 0;
		if($_POST){
			if(Input::get('test')== 'kampusbiru')
			{
				$user = new User;
				$user->username =  Input::get('username');
				$user->password = sha1(Input::get('password'));
				$user->save();
				
				return Redirect::to('logout');
			}
			else
			{
			$error = 1;
			return View::make('registration',compact('error'));
			}
		}
		else
		return View::make('registration',compact('error'));
	}
	
	
	public function showWelcome()
	{
		$error=0;
		return View::make('loginaurora',compact('error'));
		
	}
	public function doLogin()
	{
	$error=0;
	if($_POST)
	{
		
		$userdata = array(
			'username'     => Input::get('username'),
			'password'  => sha1(Input::get('password'))
			
		);

		// attempt to do the login
		if (Auth::attempt($userdata)) {

			// validation successful!
			// redirect them to the secure section or whatever
			// return Redirect::to('secure');
			// for now we'll just echo success (even though echoing in a controller is bad)
			
			$user = User::find($userdata['username']);
			Session::put('username', $user['username']);
			Session::put('user_type', $user['user_type']);
			
			
			 return Redirect::to('post');
			 

		} else {        
			$error = 1;
			// validation not successful, send back to form 
			return View::make('welcome',compact('error'));

		}
	}
	else {return view('welcome');}

	
	}
	public function doLogout()
	{
		Session::flush();
		Auth::logout();
		return Redirect::to('/');
	}
	
	public function uploading()
	{
		if(Session::has('username'))
		{
		$pp = Input::file('fileToUpload');
		$destinationPath = 'images/pp/';
		$extension = $pp->getClientOriginalExtension();
		$fileName = Session::get('username').'.'.$extension;
		$pp->move($destinationPath, $fileName);
		
		$user = User::find(Session::get('username'));
		$user->pppath = $fileName;
		$user->save();
		return Redirect::back();
		}
		else
		{
			return Redirect::to('/');
		}
	}
	
}
