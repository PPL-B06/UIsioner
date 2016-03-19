<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller{
    public function login(){
        if(\SSO\SSO::authenticate()){
            $SSO = \SSO\SSO::getUser();
            var_dump($SSO);
            session()->regenerate();
            session()->push('username', $SSO->username);
            session()->push('name', $SSO->name);
            session()->push('npm', $SSO->npm);

            //var_dump(session()->all());

            echo("lala\n");
            $email = $SSO->username . "@ui.ac.id";
            $user = \App\User::where("name", "=", $SSO->name)->first();
            var_dump($user);
            echo($user);

            if($user){
                \Auth::login($user);
             }
             else{
                $newUser = new \App\User();
                $newUser->name = $SSO->name;
                $newUser->email = $email;
                $newUser->save();

                // $user = \App\User::where("name", "=", "guest")->first();
                // \Auth::login($user);
            }
            return \Redirect::intended("/");
        }
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
            return view('/register');
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
