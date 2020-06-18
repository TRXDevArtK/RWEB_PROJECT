<?php namespace App\Models;
 use CodeIgniter\Model;
 
class Pelanggan_model extends Model
{
    protected $table = 'pelanggan';

    public function getPelanggan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['ktp' => $id])->getRowArray();
        }  
    }
} 