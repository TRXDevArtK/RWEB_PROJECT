<?php namespace App\Controllers;

class Fasilitas extends BaseController
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
        $fasilitas = new \App\Models\Fasilitas_model();
        
        if(isset($_POST['key']) && $_POST['key'] == 'read'){
            $data = $fasilitas->read_fasilitas($request->getPost());
            return $data;
        }
        
        $pagination = new \App\Models\Pagination_model;
        $data = $pagination->getPagination("fasilitas");
        
        echo view('nav');
        echo view('fasilitas', $data);
    }
}
