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
 
    $username   = $this->request->getPost('username');
    $password   = $this->request->getPost('password');
    $email      = $this->request->getPost('email');


    $data = [
        'username' => $username,
        'password' => $password,
        'email'    => $email
    ];
     
    if($validation->run($data, 'users') == FALSE){
        $response = [
            'status' => 500,
            'error'  => true,
            'data'   => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertUsers($data);
        if($simpan){
            $msg = ['message' => 'Created User successfully'];
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $msg,
            ];
            return $this->respond($response, 200);
        }
    }
    }

    public function show($id = NULL)
    { 
        $get = $this->model->getUsers($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }
 
    public function edit($id = NULL)
    {
        $get = $this->model->getUsers($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }

    public function update($id = NULL)
    {
        $validation =  \Config\Services::validation();

        $data = $this->request->getRawInput();

        if($validation->run($data, 'users') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateUsers($data,$id);
            if($simpan){
                $msg = ['message' => 'Updated User successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function delete($id = NULL)
    {
        $hapus = $this->model->deleteUsers($id);
        if($hapus){
            $code = 200;
            $msg = ['message' => 'Deleted user successfully'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }
}