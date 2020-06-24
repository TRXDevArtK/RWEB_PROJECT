<?php namespace App\Models;

use CodeIgniter\Model;

class Pagination_model extends Model
{
    protected $table = '';
    
    public function getPagination($table){
        //Ambil database
        $db = \Config\Database::connect();
        
        //Pagination Properties
        $limit          = 20;
        $query          = $db->query("SELECT COUNT(*) as count FROM $table");
        $row            = $query->getRowArray();
        $data['limit']  = $limit;
        $data['total_records']  = $row['count'];
        $data['total_pages']    = ceil($total_records / $limit);
        
        return $data;
    }
}