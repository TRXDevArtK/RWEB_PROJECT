<?php namespace App\Models;
use CodeIgniter\Model;

class Auth_model extends Model {
    
    public function get_login($post){
        //Fungsi session, kemungkinan sama seperti $_SESSION
        $session = session();
        
        $username = $post['username'];
        $password = $post['password'];
        
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('username', "$username");
        $query = $builder->get();
        foreach($query->getResult() as $row)
        {
            $id = $row->id;
            $db_username = $row->username;
            $db_password = $row->password;
        }
        
        $conf_password = password_verify($password, $db_password);
        
        if(($username == $db_username) && $conf_password == true){
            $_SESSION['login_id'] = $id;
            $_SESSION['status'] = "login";
            $_SESSION['start'] = time();
            
            if(isset($_POST['save'])){
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 24 * 60 * 60 );
            }
            else{
                $_SESSION['expire'] = $_SESSION['start'] + (180 * 60);
            }
            return true;
        }
        else{
            $_SESSION['loginsalah'] = "Login salah, silahkan coba lagi";  
            return false;
        }
        
        
        //CEK QUERY, DI ECHO KAN
        //$query   = $builder->getCompiledSelect();
        
        //return redirect()->to(base_url()."/");
        //cek error
    }
    
    public function logout(){
        session_destroy();
        redirect()->to(base_url().'/login');
    }
}