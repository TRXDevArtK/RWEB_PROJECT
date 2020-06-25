<?php namespace App\Controllers;

class Daftar extends BaseController
{
    public function index()
    {
        //Fungsi ambil post/get/dll
        $request = \Config\Services::request();
        
        if(isset($_POST['submit'])){
            $data = "bjashdwd";
            $pelanggan = new \App\Models\Pelanggan_model;
            //jng pake $this . . .
            //Kirim ke model postnya
            $pelanggan->insert_pelanggan($request->getPost());
            //kalau mau cek error, cukup echokan ini
            //echo $pelanggan->insert_pelanggan($_POST);
        }
        
        echo view('nav');
        echo view('daftar');
    }
}
