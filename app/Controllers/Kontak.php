<?php namespace App\Controllers;

class Kontak extends BaseController
{
    public function index()
    {
        echo view('nav');
        echo view('kontak');
    }
}
