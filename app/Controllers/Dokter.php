<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Dokter extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Dokter_model';
 
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create()
    {
    $validation =  \Config\Services::validation();
 
    $id          = $this->request->getPost('id');
    $nama        = $this->request->getPost('nama');
    $klinik      = $this->request->getPost('klinik');
    $jam_khusus  = $this->request->getPost('jam_khusus');
    $hari        = $this->request->getPost('hari');

    $data = [
        'id'           => $id,
        'nama'         => $nama,
        'klinik'       => $klinik,
        'jam_khusus'   => $jam_khusus,
        'hari'         => $hari,

    ];
     
    if($validation->run($data, 'Dokter') == FALSE){
        $response = [
            'status' => 500,
            'error' => true,
            'data' => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertDokter($data);
        if($simpan){
            $msg = ['message' => 'Created Dokter successfully'];
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