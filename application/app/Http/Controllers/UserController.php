<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller{

    /**
     * Show the application SSO login form.
     * If new user, fill the register form then redirect to home
     * else redirect to home
     *
     * @return \Illuminate\Http\Response
     */

    public function login(){
        if(\SSO\SSO::authenticate()){
            $SSO = \SSO\SSO::getUser();
            
            session()->put('username', $SSO->username);
            session()->put('name', $SSO->name);
            session()->put('npm', $SSO->npm);
			session()->put('org_code', $SSO->org_code);
            $user = \App\User::where("npm", "=", $SSO->npm)->first();

            if($user){
                if($user->email){
                    return \Redirect::intended("/home");
                }
                else return \Redirect::intended("/register");
                
            }
            else{
                $newUser = new \App\User();
                $newUser->name = $SSO->name;
                $newUser->npm = $SSO->npm;
                $newUser->emailui = $SSO->username . "@ui.ac.id";
                $newUser->ui_code = $SSO->org_code;
                $newUser->role = $SSO->role;
                $newUser->status = "ACTIVE";

                $newUser->save();
            }
            return \Redirect::intended("/register");
        }
    }

    public function logout(){
        session()->flush();
        \SSO\SSO::logout();
    }

    public function faq()
    {
        return view('/faq');
    }

     /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        if(\SSO\SSO::authenticate()){
            $SSO = \SSO\SSO::getUser();
            $user = \App\User::where("npm", "=", $SSO->npm)->first();
            if($user){
                if($user->email) return view('index'); 
                else{
                    return $this->showRegistrationForm();
                }   
            }
            else return \Redirect::intended("/login");          
        }
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('/register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

         if ($validator->fails()) {
            $messages = $validator->messages();
                return  \Redirect::to('/register')
                    ->withErrors($validator)
                    ->withInput();

        } 

        else {
            // kalo valid masukin ke DB dan masuk ke /home
            
            $email = $request->email;
            $hp = $request->phone;
            DB::table('users')->where('npm', session()->get('npm'))->update(['email' => $email]);
            DB::table('users')->where('npm', session()->get('npm'))->update(['hp' => $hp]);
            return \Redirect::intended("/home");
        }


        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
       $rules = array(
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|regex:/^\+?[^a-zA-Z]{5,}$/',
        );

        return $validator = Validator::make($data, $rules);
    }
}