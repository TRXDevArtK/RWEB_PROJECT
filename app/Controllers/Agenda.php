<?php namespace App\Controllers;

class Agenda extends BaseController
{
    public function index()
    {
        echo view('nav');
        echo view('agenda');
    }
}
