<?php namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        //CHECK LOGIN
        helper('auth');
        $login = check_login();
        if($login == 0){
            return redirect()->to(base_url().'/login');
        }
        
        //Jike klik tombol logout
        if(isset($_POST['destroy'])){
            unset ($_SESSION['login_id']);
            session_destroy();
            return redirect()->to(base_url().'/login');
        }
        
        return view('dashboard/index');
    }
}
