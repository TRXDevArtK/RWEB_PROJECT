<?php namespace App\Controllers;

class Desc_artikel extends BaseController
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
        
        if(isset($_POST['submit'])){
            $data = $artikel->read_desc_artikel($request->getPost());
            
            $href['href'] = "back_url";
            echo view('nav', $href);
            echo view('desc_artikel', $data);
            //print_r($data);
        }
        else{
            echo "maaf page tidak ada";
        }
    }
}
