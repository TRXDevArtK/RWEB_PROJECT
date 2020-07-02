<?php namespace App\Database\Seeds;
  
class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'username'   => 'himawan',
            'password'   => '123456',
            'email'      => 'himawan@gmail.com'
        ];
        $this->db->table('users')->insert($data1);
    }
} 