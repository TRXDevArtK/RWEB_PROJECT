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
}
