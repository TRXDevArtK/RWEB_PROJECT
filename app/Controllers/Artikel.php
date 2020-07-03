<?php namespace App\Controllers;

class Artikel extends BaseController
{
    public function index()
    {
        $pagination = new \App\Models\Pagination_model;
        $data = $pagination->getPagination("agenda");
        
        echo view('nav');
        echo view('artikel', $data);
    }
}
