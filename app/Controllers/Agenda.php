<?php namespace App\Controllers;

class Agenda extends BaseController
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
        $agenda = new \App\Models\Agenda_model();
        
        if(isset($_POST['key']) && $_POST['key'] == 'read'){
            $data = $agenda->read_agenda($request->getPost());
            return $data;
        }
        
        $pagination = new \App\Models\Pagination_model;
        $data = $pagination->getPagination("agenda");
        
        echo view('nav');
        echo view('agenda', $data);
    }
}
