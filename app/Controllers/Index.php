<?php namespace App\Controllers;

class Index extends BaseController
{
	public function index()
	{
        //Controller untuk halaman index
		//return view('index_rsjogja');
		echo view('index_rsjogja');
	}

}