<?php namespace App\Controllers;

use CodeIgniter\Controller;

class MySite extends Controller
{

    public function index()
    {
        echo view('my_templates/header');
        echo view('my_templates/content');
        echo view('my_templates/footer');
    }

}