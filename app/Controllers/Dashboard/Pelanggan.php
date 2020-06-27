<?php namespace App\Controllers\Dashboard;

use CodeIgniter\Controller;

class Pelanggan extends Controller
{
    public function index()
    {
        //FUNGSI UMUM
        //
        //Fungsi ambil post/get/dll , JANGAN LUPA!
        $request = \Config\Services::request();
        
        //Ambil model
        //Catatan : ini bisa ngambil di public function jika dibuat
        //Tapi itu harus enable auto routing . . 
        if(isset($_POST['key']) && $_POST['key'] == 'load'){
            //Ambil model
            //Catatan : ini bisa ngambil di public function jika dibuat
            //Tapi itu harus enable auto routing . . 
            $pelanggan = new \App\Models\Pelanggan_model;
            //jng pake $this . . .
            //Kirim ke model postnya
            $data = $pelanggan->get_pelanggan($request->getPost());
            
            //Untuk ajax, pengambilan data harus hanya me return hasilnya saja, tidak seluruh page
            //Itulah kita bisa memanggil return, dari pada echo
            //kalau echo dia bakalan panggil lagi pagenya (inikan ajax, jadi gk perlu)
            //contoh lain bisa di ambil di login controller
            return $data;
        }
        
        $model = new \App\Models\Pagination_model;
        $data = $model->getPagination("pelanggan");

        return view('Dashboard/pelanggan', $data);
    }
}
