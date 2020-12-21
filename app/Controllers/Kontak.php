<?php namespace App\Controllers;

class Kontak extends BaseController
{
    public function index()
    {
        //Fungsi ambil post/get/dll
        $request = \Config\Services::request();
        
        if(isset($_POST['submit'])){
            $model = new \App\Models\Kontak_model;
            //jng pake $this . . .
            //Kirim ke model postnya
            $model->insert_knp($request->getPost());
            //kalau mau cek error, cukup echokan ini
            //echo $this->db->error();
            //echo $pelanggan->insert_pelanggan($_POST);
        }
        
        echo view('nav');
        echo view('kontak');
    }
}
