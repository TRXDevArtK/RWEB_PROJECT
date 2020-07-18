<?php namespace App\Controllers;

class Artikel extends BaseController
{
    public function index()
    {
        //FUNGSI UMUM
        //
        //Fungsi ambil post/get/dll , JANGAN LUPA!
        $request = \Config\Services::request();
        
        //Ambil model
        //Catatan : ini bisa ngambil di public function (disini) jika dibuat
        //Tapi itu harus enable auto routing . . 
        $artikel = new \App\Models\Artikel_model();
        
        if(isset($_POST['key']) && $_POST['key'] == 'read'){
            $data = $artikel->read_artikel($request->getPost());
            return $data;
        }
        
        $pagination = new \App\Models\Pagination_model;
        $data = $pagination->getPagination("artikel");
        
        echo view('nav');
        echo view('artikel', $data);
    }
}
