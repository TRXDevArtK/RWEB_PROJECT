<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Users extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Users_model';
 
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create()
    {
    $validation =  \Config\Services::validation();
 
    $id         = $this->request->getPost('id');
    $username   = $this->request->getPost('username');
    $password   = $this->request->getPost('password');
    $email      = $this->request->getPost('email');


    $data = [
        'id'       => $id,
        'username' => $username,
        'password' => $password,
        'email'    => $email,
    ];
     
    if($validation->run($data, 'Users') == FALSE){
        $response = [
            'status' => 500,
            'error'  => true,
            'data'   => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertUsers($data);
        if($simpan){
            $msg = ['message' => 'Created Users successfully'];
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $msg,
            ];
            return $this->respond($response, 200);
        }
    }
    }
}