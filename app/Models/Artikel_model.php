<?php namespace App\Models;
use CodeIgniter\Model;

class Artikel_model extends Model {
    
    public function read_artikel($post){
        $limit = $post['limit'];
        if (isset($data['page'])){ 
            $page  = $post['page']; 
        } 
        else{ 
            $page=1; 
        }  

        $start_from = ($page-1) * $limit;  
        
        $db      = \Config\Database::connect();
        $builder = $db->table('artikel');
        $builder->select('id, judul, ,deskripsi, gambar, tanggal, penulis');
        $query   = $builder->get($limit, $start_from);
        $row = $query->getResultArray();
        //ini dah benar, tapi gambarnya response 200

        //agar data persatu-satu bisa diedit, gunakan for loop (jng foreach)
        $data = array();
        for($i=0;$i<count($row);$i++)
        {
            $data[$i]['id'] = $row[$i]['id'];
            $data[$i]['judul'] = $row[$i]['judul'];
            $data[$i]['deskripsi'] = $row[$i]['deskripsi'];
            $data[$i]['gambar'] = base64_encode($row[$i]['gambar']);
            $data[$i]['tanggal'] = $row[$i]['tanggal'];
            $data[$i]['penulis'] = $row[$i]['penulis'];
            //$data[] = $row;
        }

        return json_encode($data);
    }
    
    public function read_desc_artikel($post){
        $db      = \Config\Database::connect();
        $builder = $db->table('artikel');
        $builder->where('id', $post['id']);
        $query = $builder->get();
        $row = $query->getResultArray();
        $data = array();
        //pake getresultarray agar bisa di panggil
        foreach($query->getResultArray() as $row)
        {
            $data['id'] = $row['id'];
            $data['judul'] = $row['judul'];
            $data['gambar'] = base64_encode($row['gambar']);
            $data['tanggal'] = $row['tanggal'];
            $data['penulis'] = $row['penulis'];
            $data['html'] = $row['html'];
        }
        
        return $data;
    }
}