<?php namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

use App\Models\Pagination_model;
use CodeIgniter\Controller;

class Pelanggan extends BaseController
{
    public function index()
    {
        //Ambil model
        $model = new Pagination_model();
        $data = $model->getPagination("pelanggan");
        
        return view('Dashboard/pelanggan', $data);
    }
}
