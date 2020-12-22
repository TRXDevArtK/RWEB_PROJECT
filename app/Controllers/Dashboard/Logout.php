<?php namespace App\Controllers\Dashboard;

use CodeIgniter\Controller;

class Logout extends Controller
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
        //$request = \Config\Services::request();
        
        $login = new \App\Models\Auth_model;
        return $login->logout();
    }
}
