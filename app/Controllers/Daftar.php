<?php namespace App\Controllers;

class Daftar extends BaseController
{
    public function index()
    {
        if(isset($_POST['submit'])){
            helper('form');
        }
        echo view('nav');
        echo view('daftar',$data);
    }
}
