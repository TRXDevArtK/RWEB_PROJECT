<?php namespace App\Models;
 use CodeIgniter\Model;
 
class Dokter_model extends Model
{
    protected $table = 'dokter';

    public function getDokter($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }  
    }
} 