<?php namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {   
        //Fungsi ambil post/get/dll , JANGAN LUPA!
        $request = \Config\Services::request();
        
        //Check kalau sudah login
        if(isset($_SESSION['status'])){
            return redirect()->to(base_url().'/dashboard');
        }
        
        //Jika SUBMIT LOGIIN
        if(isset($_POST['submit'])){
            //Ambil model
            //Catatan : ini bisa ngambil di public function jika dibuat
            //Tapi itu harus enable auto routing . . 
            $login = new \App\Models\Auth_model;
            //jng pake $this . . .
            //Kirim ke model postnya
            //redirect ke page kembali, ditangani oleh model
            //Catatan : redirect jangan di model, tapi di controller
            $run = $login->get_login($request->getPost());
            if($run == true){
                return redirect()->to(base_url().'/dashboard');
            }
        }
        
        return view('login');
    }
}
