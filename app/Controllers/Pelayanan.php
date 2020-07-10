<?php namespace App\Controllers;

class Pelayanan extends BaseController
{
    public function index()
    {
        echo view('nav');
        echo view('pelayanan');
    }
}
