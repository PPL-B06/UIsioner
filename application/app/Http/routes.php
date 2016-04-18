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
	Route::get('/addcoin', 'HomeController@addCoin');
	Route::get('/redeemcoin', 'HomeController@redeemCoin');
	Route::get('/coinrequest', 'HomeController@coinRequest');
	Route::get('/faq', 'UserController@faq');
	Route::get('/register', 'UserController@getRegister');
	Route::post('/register', 'UserController@postRegister');
	Route::get('/login', 'UserController@login');
	Route::get('/home', 'HomeController@index');
	Route::get('/create-form', 'FormController@create');
	Route::post('/postForm', 'FormController@postForm');
	Route::post('/postAnswer', 'FormController@postAnswer');
	Route::get('/fill-form/{formID}', 'FormController@fillForm');
	Route::get('/my-forms', 'FormController@getForms');
	Route::get('/result/{formID}', 'FormController@result');
	Route::get('/logout', 'UserController@logout'); 
	Route::get('/logout', 'UserController@logout');
	Route::get('/my-responses', 'HomeController@getResponses');
	Route::get('/approvereq/{reqID}', 'HomeController@approveReq');
});