<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Pelanggan extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Pelanggan_model';
 
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }
}