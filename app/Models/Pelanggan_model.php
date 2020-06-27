<?php namespace App\Models;
use CodeIgniter\Model;

class Pelanggan_model extends Model
{
    protected $table = "pelanggan";

    public function get_pelanggan($post)
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
        $builder = $db->table('pelanggan');
        $query   = $builder->get($limit, $start_from);
        
        foreach($query->getResult() as $row)
        {
            $data[] = $row;
        }

        return json_encode($data);
    } 

    public function insert_pelanggan($post)
    {
        //TGL
        $hari = $post['hari'];
        $bulan = $post['bulan'];
        $tahun = $post['tahun'];
        
        $id = mt_rand(1000000000, 2100000000);
        
        $tgl = $tahun."-".$bulan."-".$hari;
        
        //EMAIL
        if(!empty($post['email'])){
            $email = $post['email'];
        }
        else{
            $email;
        }
        
        //susun arraynya kalau mau otomatis
        $post = [
            'ktp' => $post['ktp'],
            'id'  => $id,
            'nama' => $post['nama'],
            'jk'  => $post['jk'],
            'tgl'  => $tgl,
            'tlp'  => $post['tlp'],
            'email'  => $email,
            'verifikasi'  => '0'
        ];
        
        $db      = \Config\Database::connect();
        $builder = $db->table("pelanggan");
        
        if($builder->insert($post)){
            return redirect($_SERVER['REQUEST_URI'], 'refresh');
        }
        else{
            return false;
        }
        
        //Kalau mau cek error query sql
        //print_r($this->db->error());
    }

    public function update_pelanggan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function delete_pelanggan($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}