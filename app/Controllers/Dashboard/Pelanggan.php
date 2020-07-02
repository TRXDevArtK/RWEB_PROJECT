<?php namespace App\Controllers\Dashboard;

use CodeIgniter\Controller;

class Pelanggan extends Controller
{
    public function index()
    {
        //CHECK LOGIN
        helper('auth');
        $login = check_login();
        if($login == 0){
            return redirect()->to(base_url().'/login');
        }
        
        //FUNGSI UMUM
        //
        //Fungsi ambil post/get/dll , JANGAN LUPA!
        $request = \Config\Services::request();
        
        //Ambil model
        //Catatan : ini bisa ngambil di public function (disini) jika dibuat
        //Tapi itu harus enable auto routing . . 
        $pelanggan = new \App\Models\Pelanggan_model;
        
        if(isset($_POST['key']) && $_POST['key'] == 'read'){
            //jng pake $this . . . (CI 3)
            //Kirim ke model postnya
            $data = $pelanggan->read_pelanggan($request->getPost());
            
            //Untuk ajax, pengambilan data harus hanya me return hasilnya saja, tidak seluruh page
            //Itulah kita bisa memanggil return, dari pada echo
            //kalau echo dia bakalan panggil lagi pagenya (inikan ajax, jadi gk perlu)
            //contoh lain bisa di ambil di login controller
            return $data;
        }
        
        if(isset($_POST['key']) && $_POST['key'] == 'update'){
            //Untuk debug errornya, untuk sekarang, 
            //coba fungsi di modelnya dipindahin ke controller dan jalanin . ..
            $data = $pelanggan->update_pelanggan($request->getPost());
            return $data;
        }
        
        if(isset($_POST['key']) && $_POST['key'] == 'delete'){
            $data = $pelanggan->delete_pelanggan($request->getPost());
            return $data;
        }
        
        if(isset($_POST['key']) && $_POST['key'] == 'ver'){
            $data = $pelanggan->verifikasi_pelanggan($request->getPost());
            return $data;
        }
        
        $pagination = new \App\Models\Pagination_model;
        $data = $pagination->getPagination("pelanggan");

        return view('dashboard/pelanggan', $data);
    }
}
