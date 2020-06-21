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
        pada function di dalam class pelanggan 
        */
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelanggan->getPelanggan();
        echo view('dashboard/pelanggan', $data);
	}

	public function create()
	{
		//echo 'Hallo Dunia!' ;
    	return view('dashboard/pelanggan/create');
	}

	public function store()
	{
		// Mengambil value dari form dengan method POST
		$nama = $this->request->getPost('nama');
		$ktp  = $this->request->getPost('ktp');

		// Membuat array collection yang disiapkan untuk insert ke table
		$data = [
			'nama' => $nama,
			'ktp' => $ktp
		];

		/* 
		Membuat variabel simpan yang isinya merupakan memanggil function 
		insert_pelanggan dan membawa parameter data 
		*/
		$simpan = $this->pelanggan->insert_pelanggan($data);

		// Jika simpan berhasil, maka ...
		if($simpan)
		{
			// Deklarasikan session flashdata dengan tipe success
			session()->setFlashdata('success', 'Created pelanggan successfully');
			// Redirect halaman ke pelanggan
			return redirect()->to(base_url('dashboard/pelanggan')); 
		}
	} 

	public function insert_pelanggan($data)
	{
		return $this->db->table($this->table)->insert($data);
	} 


}