<?php namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		return view('dashboard\index');
	}
	public function view()
	{
		return view('dashbard\pelanggan');
	}
	//--------------------------------------------------------------------

}
