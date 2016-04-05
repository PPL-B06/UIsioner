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
    public function create(){
        if(\SSO\SSO::authenticate()){
            return view('/createform');
        }
    }
	
	public function fillform($formID)
    {
        if(\SSO\SSO::authenticate()){
			$questions = DB::table('question')->where('form_ID', ''+$formID)->get();
		
			return view('fillform', ['questions' => $questions]);
        }
    }
	
	public function post(Request $request)
    {
        if(\SSO\SSO::authenticate()){
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
				 
				return \Redirect::intended("/home");
				
        }
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