<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function () {
	return view('faq'); 
});

Route::get('/check', 'UserController@check');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {  
	Route::get('/register', 'UserController@getRegister');
	Route::post('/register', 'UserController@postRegister');
	Route::get('/login', 'UserController@login');
	Route::get('/home', 'HomeController@index');
	Route::get('/createform', 'FormController@create');
	Route::post('/postform', 'FormController@post');
	Route::get('/fillform/{formID}', 'FormController@fillform');
	Route::get('/logout', 'UserController@logout'); 
});