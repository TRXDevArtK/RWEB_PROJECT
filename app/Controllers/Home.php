<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
=======
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
        
>>>>>>> master
        echo view("home_rsjogja");
    }

    //--------------------------------------------------------------------

}
