<?php namespace App\Models;
 use CodeIgniter\Model;
 
class Users_model extends Model {
 
    protected $table = 'users';
 
    public function getUsers($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }  
    }
     
    public function insertUsers($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateUsers($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
 
    public function deleteUsers($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
} 