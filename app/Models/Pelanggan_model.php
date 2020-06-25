<?php namespace App\Models;
use CodeIgniter\Model;

class Pelanggan_model extends Model
{
    protected $table = "pelanggan";

    public function get_pelanggan($id = false)
    {
        
    } 

    public function insert_pelanggan($data)
    {
        //TGL
        $hari = $data['hari'];
        $bulan = $data['bulan'];
        $tahun = $data['tahun'];
        
        $id = mt_rand(1000000000, 2100000000);
        
        $tgl = $tahun."-".$bulan."-".$hari;
        
        //EMAIL
        if(!empty($data['email'])){
            $email = $data['email'];
        }
        else{
            $email;
        }
        
        //susun arraynya kalau mau otomatis
        $data = [
            'ktp' => $data['ktp'],
            'id'  => $id,
            'nama' => $data['nama'],
            'jk'  => $data['jk'],
            'tgl'  => $tgl,
            'tlp'  => $data['tlp'],
            'email'  => $email,
            'verifikasi'  => '0'
        ];
        
        $db      = \Config\Database::connect();
        $builder = $db->table("pelanggan");
        
        if($builder->insert($data)){
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