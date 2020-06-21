<?php namespace App\Controllers\Dashboard;
use CodeIgniter\Controller;
use App\Models\Pelanggan_model;

class Pelanggan extends Controller
{

    public function __construct() {

        // Mendeklarasikan class Pelanggan_model menggunakan $this->pelanggan
        $this->pelanggan = new Pelanggan_model();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelanggan->getPelanggan();
        echo view('pelanggan/index', $data);
    } 
}