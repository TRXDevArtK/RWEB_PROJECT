<?php namespace App\Models;
use CodeIgniter\Model;

class Pelanggan_model extends Model
{
    protected $table = "pelanggan";

    public function getPelanggan($id = false)
    {
        if($id === false){
            return $this->table('pelanggan')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('pelanggan')
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();
        }   
    } 

    public function insert_pelanggan($data)
    {
        return $this->db->table($this->table)->insert($data);
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