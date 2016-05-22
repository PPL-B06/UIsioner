<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function blast(Request $request){
        if(\SSO\SSO::authenticate()){
        	// cek apakah authenticated user adalah admin
            if (session()->get('role')=="admin"){
                // kode dan nama fakultas yang berada di SSO
                $codeOrg = array(
                    "01" => "FK",
                    "02" => "FKG",
                    "03" => "MIPA",
                    "04" => "TEKNIK",
                    "05" => "HUKUM",
                    "06" => "FEB",
                    "07" => "FIB",
                    "08" => "PSIKOLOGI",
                    "09" => "FISIP",
                    "10" => "FKM",
                    "12" => "FASILKOM",
                    "13" => "FIK",
                    "14" => "PASCASARJANA",
                    "15" => "VOKASI",
                    "16" => "PEROLEHAN KREDIT",
                    "17" => "FARMASI"
                );

                // inisiasi array yang berisi kumpulan form yang ingin dilakukan blast email berdasarkan fakultas
                $emailBlast = [];
                foreach ($codeOrg as $code => $facultyName) {
                    // hitung jumlah form yang belum di boost berdasarkan filter yang sesuai
                    $itemPerFaculty = DB::table('form')->join('filter', 'form.ID', '=', 'filter.form_ID')->where([['filter.type','=','Faculty'],['filter.name','=',$code],['form.boosted','=','0']])->count();

                    // jika jumlah form > 0 maka masukkan ke dalam array
                    if ($itemPerFaculty>0) {
                        $emailBlast[$facultyName]=$itemPerFaculty;
                    }
                }

                // jika array emailBlast tidak kosong, lakukan kirim email
                if(empty($emailBlast)){
                	// redirect menuju page home dan menampilkan info.
                	return \Redirect::intended("/home")->with('alert-info','Belum ada form yang bisa dilakukan blast email.');
                }else{
                	/*
                	// dummy
                    $values = array(
                        "Ilham Kurniawan" => "ilhamkurni@gmail.com"
                        "Hasandi Patriawan" => "sandi.patriawan@gmail.com"
                    );
                    */

                    // get array of column name & email in table user
                    $values = DB::table('users')->pluck('email', 'name');

                    // lakukan iterasi sebanyak isi dari array values
                    foreach ($values as $name => $email) {
                        // kirim email dengan view: /views/emails/blast.blade.php
                        // variabel yang dibutuhkan:
                        // values = array of email tujuan
                        // name = keys of values array
                        // sub = email subject
                        // web = variable yang dipakai di view

                        $sub = "Hi {$name}! Yuk isi form baru di UIsioner :)";

                        Mail::send('emails.blast', ['array' => $emailBlast], function ($message) use ($name,$values,$sub) {
                            $message->from('uisioner@gmail.com', 'Admin UIsioner');
                            $message->to($values[$name])->subject($sub);
                        });
                    }
                    // ubah variabel boosted menjadi 1, karena email sudah berhasil terkirim
                    DB::table('form')->update(['form.boosted' => 1]);

                    // redirect menuju page home dan menampilkan pesan sukses.
					return \Redirect::intended("/home")->with('alert-success','Selamat! Email blast berhasil dilakukan.');
                }
            }
            else{
            	// redirect menuju page access denied.
                return view('denied');
            }
        }
    }
}
