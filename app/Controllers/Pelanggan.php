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

    public function create()
    {
    $validation =  \Config\Services::validation();
 
    $ktp        = $this->request->getPost('ktp');
    $nama       = $this->request->getPost('nama');
    $jk         = $this->request->getPost('jk');
    $tgl        = $this->request->getPost('tgl');
    $tlp        = $this->request->getPost('tlp');
    $email      = $this->request->getPost('email');
    $verifikasi  = $this->request->getPost('verifikasi');
     
    $data = [
        'ktp'           => $ktp,
        'nama'          => $nama,
        'jk'            => $jk,
        'tgl'           => $tgl,
        'tlp'           => $tlp,
        'email'         => $email,
        'verifikasi'    => $verifikasi
    ];
     
    if($validation->run($data, 'pelanggan') == FALSE){
        $response = [
            'status' => 500,
            'error' => true,
            'data' => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertPelanggan($data);
        if($simpan){
            $msg = ['message' => 'Created pelanggan successfully'];
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