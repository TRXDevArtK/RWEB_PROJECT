<?php namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        //FUNGSI UMUM
        //
        //Fungsi ambil post/get/dll , JANGAN LUPA!
        $request = \Config\Services::request();
        
        //Jika SUBMIT LOGIIN
        if(isset($_POST['submit'])){
            //Ambil model
            //Catatan : ini bisa ngambil di public function jika dibuat
            //Tapi itu harus enable auto routing . . 
            $login = new \App\Models\Auth_model;
            //jng pake $this . . .
            //Kirim ke model postnya
            //redirect ke page kembali, ditangani oleh model
            return $login->get_login($request->getPost());
        }
        
        return view('login');
    }
}
