<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function send(Request $request){
        if(\SSO\SSO::authenticate()){
            $values = array(
                "ilham907"=>"ilham907@gmail.com",
                "ilhamline" => "ilhamline8@gmail.com",
                "ilham kurniawan" => "ilhamkurni@gmail.com"
                );

            // lakukan iterasi sebanyak isi dari array values
            foreach ($values as $name => $email) {

            // kirim email dengan view: /views/emails/welcome.blade.php
            // variabel yang dibutuhkan:
            // values = array of email tujuan
            // name = keys of values array
            // sub = email subject
            // web = variable yang dipakai di view

                $sub = "Hi {$name}! Selamat datang di UIsioner";

                Mail::send('emails.welcome', ['web' => "UIsioner"], function ($message) use ($name,$values,$sub) {
                    
                    $message->from('ilhamkurni@gmail.com', 'Admin UIsioner');

                    $message->to($values[$name])->subject($sub);

                });
            }
            return "Your email has been sent successfully";    
        }
    }
}
