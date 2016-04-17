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

class FormController extends Controller{
    public function create(){ //untuk membuat form
        if(\SSO\SSO::authenticate()){ //jika user terauntetikasi oleh SSO
            return view('/createform'); //redirect ke halaman createform
        }
    }
	
	public function fillform($formID) //untuk mengisi sebuah form
    {
        if(\SSO\SSO::authenticate()){ //jika user terauntetikasi oleh SSO
			$questions = DB::table('question')->where('form_ID', ''+$formID)->get(); //mengambil list pertanyaan dari sebuah form dengan id $formID

			return view('fillform', ['questions' => $questions, 'formID' => $formID]); //redirect ke halaman fillform
        }
    }
	
	public function postForm(Request $request) //untuk memasukan sebuah form ke database
    {
        if(\SSO\SSO::authenticate()){ //jika user terauntetikasi oleh SSO
				//insert ke tabel form
				$id = DB::table('form')->insertGetId(
					['Title' => $request->title, 'NPM' => session()->get('npm'), 'Description' => $request->description, 'TargetNumber' => $request->targetnumber, 'Reward' => $request->reward, 'Qnumber' => $request->qnumber]
				);
				
				//insert ke tabel question
				$i=1;
				while($i <= $request->qnumber)
				{
					DB::table('question')->insert([
						['form_ID' => $id, 'Type' => 'text', 'Title' => $request->$i, 'Choices' => '']
					]);
					$i++;
				}
				
				//insert ke tabel filter
					for($j=0; $j < 15; $j++)
					{
						$temp="tar".$j;
						if($request->has($temp))
						{
					  DB::table('filter')->insert([['form_ID' => $id, 'name' => $request->$temp, 'type' => 'Faculty']]);
					  }
					}
				 
				return \Redirect::intended("/home"); //redirect ke controller home
				
        }
    }

    public function postAnswer(Request $request) {
    	if(\SSO\SSO::authenticate()){ //jika user terauntetikasi oleh SSO
			//mengambil row database form dengan ID $request->formID
			$form = DB::table('form')->where('ID', '=', $request->formID)->first();				

			//insert ke tabel question
			$firstQID = DB::table('question')->where('form_ID', '=', $request->formID)->orderBy('ID', 'asc')->first()->ID;
			$lastQID = $firstQID + $form->QNumber;
			while($firstQID < $lastQID)
			{
				DB::table('answer')->insert([
					['question_ID' => $firstQID, 'NPM' => session()->get('npm'), 'title' => $request->$firstQID]
				]);
				$firstQID++;
			}
			
			//update FilledNumber
			DB::table('form')->where('ID', '=', $request->formID)->update(['FilledNumber' => 1+$form->FilledNumber]);
			return \Redirect::intended("/home"); //redirect ke controller home
				
        }
    }
	
   

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data) //untuk memvalidasi email dan phone pada form registrasi
    {
       $rules = array(
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|regex:/^\+?[^a-zA-Z]{5,}$/',
        );

        return $validator = Validator::make($data, $rules);
    }
}