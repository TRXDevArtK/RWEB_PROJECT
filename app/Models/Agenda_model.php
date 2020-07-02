<?php namespace App\Models;
use CodeIgniter\Model;

class Agenda_model extends Model {
    
    public function read_agenda($post){
        $limit = $post['limit'];
        if (isset($data['page'])){ 
            $page  = $post['page']; 
        } 
        else{ 
            $page=1; 
        }  

        $start_from = ($page-1) * $limit;  
        
        $db      = \Config\Database::connect();
        $builder = $db->table('agenda');
        $query   = $builder->get($limit, $start_from);
        
        foreach($query->getResult() as $row)
        {
            $data[] = $row;
        }

        return json_encode($data);
    }
}