<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	// Validasi Pelanggan
	public $pelanggan = [
		'ktp'         	=> 'required',
		'nama'       	=> 'required',
		'jk'			=> 'required',
		'tgl'			=> 'required',
		'tlp'			=> 'required',
		'email'			=> 'required',
		'verifikasi'	=> ''
	];
		 
	public $pelanggan_errors = [
		'ktp'=> [
			'required'  => 'KTP wajib diisi.'
		],
		'nama'=> [
			'required'  => 'Nama wajib diisi.'
		],
		'jk'=> [
			'required'  => 'Jenis Kelamin wajib diisi.'
		],
		'tgl'=> [
			'required'  => 'Tanggal wajib diisi.'
		],
		'tlp'=> [
			'required'  => 'Telephone wajib diisi.'
		],
		'email'=> [
			'required'  => 'Email wajib diisi.'
		]
		// 'verifikasi'=> [
		// 	'required'  => 'Verifikasi wajib diisi.'
		// ]
	];
	//--------------------------------------------------------------------
	// Validasi Dokter
	public $dokter = [
        'id'           => 'required',
        'nama'         => 'required',
        'klinik'       => 'required',
        'jam_khusus'   => 'required',
        'hari'         => 'required'
	];
	 
	public $dokter_errors = [
		'id'=> [
			'required'  => 'ID wajib diisi.'
		],
		'nama'=> [
			'required'  => 'Nama wajib diisi.'
		],
		'klinik'=> [
			'required'  => 'Klinik wajib diisi.'
		],
		'jam_khusus'=> [
			'required'  => 'Jam Khusus wajib diisi.'
		],
		'hari'=> [
			'required'  => 'Hari wajib diisi.'
		]
	];
	//--------------------------------------------------------------------
	// Validasi Users
	public $users = [
        'id'       => 'required',
        'username' => 'required',
        'password' => 'required',
        'email'    => 'required'
	];
	 
	public $users_errors = [
		'id'=> [
			'required'  => 'ID wajib diisi.'
		],
		'username'=> [
			'required'  => 'Username wajib diisi.'
		],
		'password'=> [
			'required'  => 'Password wajib diisi.'
		],
		'email'=> [
			'required'  => 'Email Khusus wajib diisi.'
		]
	];
	//--------------------------------------------------------------------
}