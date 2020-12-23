<?php namespace App\Models;
use CodeIgniter\Model;

class Kontak_model extends Model {
    
    public function read_knp($post)
    {
        $limit = $post['limit'];
        if (isset($data['page'])){ 
            $page  = $post['page']; 
        } 
        else{ 
            $page=1; 
        }  

        $start_from = ($page-1) * $limit;  
        
        $db      = \Config\Database::connect();
        $builder = $db->table('kontak');
        $query   = $builder->get($limit, $start_from);
        
        foreach($query->getResult() as $row)
        {
            $data[] = $row;
        }

        return json_encode($data);
    } 
    
    public function insert_knp($post){
        $db      = \Config\Database::connect();
        $builder = $db->table("kontak");

        //EMAIL
        if(!empty($post['email'])){
            $email = $post['email'];
        }
        else{
            $email;
        }
        
        if(!empty($post['hp'])){
            $hp = $post['hp'];
        }
        else{
            $hp;
        }
        
        if(!empty($post['alamat'])){
            $alamat = $post['alamat'];
        }
        else{
            $alamat;
        }

        //susun arraynya kalau mau otomatis
        $data = [
            'id' => '',
            'nama' => $post['nama'],
            'alamat' => $post['alamat'],
            'hp'  => $post['hp'],
            'email'  => $post['email'],
            'subjek'  => $post['subjek'],
            'deskripsi'  => $post['deskripsi']
        ];
        
        if($builder->insert($data)){
            return true;
        }
        else{
            return false;
        }


        //Kalau mau cek error query sql
        //print_r($this->db->error());
    }
    
}

?>

