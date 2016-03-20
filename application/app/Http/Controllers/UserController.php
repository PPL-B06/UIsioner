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
    public function login(){
        if(\SSO\SSO::authenticate()){
            $SSO = \SSO\SSO::getUser();
            session()->regenerate();
            session()->push('username', $SSO->username);
            session()->push('name', $SSO->name);
            session()->push('npm', $SSO->npm);
            $user = \App\User::where("npm", "=", $SSO->npm)->first();

            if($user){
                if($user->email){
                    \Auth::login($user);
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
        Session::flush();
        Auth::logout();
        \SSO\SSO::logout();
    }

     /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

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
            
            var_dump($request->session()->all());

            // DB::table('users')->where('npm', session()->get('npm'))->update('email' => $a["email"]);
            // DB::table('users')->where('npm', session()->get('npm'))->update('hp' => $a["phone"]);
            //return view('/home');
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