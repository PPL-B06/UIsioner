<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
