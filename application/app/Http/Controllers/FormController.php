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
		
            return view('/create-form'); //redirect ke halaman createform
        }
    }
	
	public function fillform($formID) //untuk mengisi sebuah form
    {
        if(\SSO\SSO::authenticate()){ //jika user terauntetikasi oleh SSO
			$questions = DB::table('question')->where('form_ID', ''+$formID)->get(); //mengambil list pertanyaan dari sebuah form dengan id $formID
			
			return view('fill-form', ['questions' => $questions, 'formID' => $formID]); //redirect ke halaman fillform
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
				
				//kurangi koin creator sebanyak reward x target number form
				DB::table('users')->where('npm','=',session()->get('npm'))->decrement('coin', $request->targetnumber * $request->reward);
				
				//redirect menuju page home dan menampilkan pesan sukses.
				return \Redirect::intended("/home")->with('alert-success','Selamat! Form anda berhasil dibuat.'); //redirect ke controller home
				
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
			
			//tambahkan koin user sesuai reward form
			DB::table('users')->where('npm','=',session()->get('npm'))->increment('coin', $form->Reward);
			
			//redirect menuju page home dan menampilkan pesan sukses.
			return \Redirect::intended("/home")->with('alert-success','Selamat! Anda berhasil melakukan pengisian form.');
				
        }
    }
	
   public function getForms() //untuk mengisi sebuah form
    {
        if(\SSO\SSO::authenticate()){ //jika user terauntetikasi oleh SSO
			$forms = DB::table('form')->where('form.npm','=',session()->get('npm'))->orderBy('Time_Stamp', 'desc')->get();
			
			
					
			return view('my-forms', ['forms' => $forms]); //redirect ke halaman myform
        }
        
    }

    public function result($formID) //untuk mengisi sebuah form
    {
        if(\SSO\SSO::authenticate()){ //jika user terauntetikasi oleh SSO
			$questions = DB::table('question')->where('question.form_ID','=',$formID)->get();

			$qlist = DB::table('question')->select('question.ID') -> where('question.form_ID','=',$formID) -> lists('question.ID');

			$answers = DB::table('answer')-> join('users', 'answer.NPM' ,'=' , 'users.NPM') -> whereIn('answer.question_ID', $qlist)->get();

			$form = DB::table('form')->select('QNumber') -> where('form.ID','=',$formID)->first();

			$unumber = sizeof($answers) / $form->QNumber;

			return view('result', ['questions' => $questions, 'answers' => $answers, 'qnumber' => ''.$form->QNumber, 'unumber' => $unumber]); //redirect ke halaman myform
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