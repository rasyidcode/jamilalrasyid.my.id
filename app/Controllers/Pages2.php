<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BlogModel;

class Pages2 extends Controller
{

    public function index()
    {
        $blogModel = new BlogModel;
        $data['posts'] = $blogModel->getPosts();

        echo view('templates2/header');
        echo view('pages2/home', $data);
        echo view('templates2/footer');
    }

    public function showme($page = 'home')
    {
        if (!is_file(APPPATH.'/Views/pages2/'.$page.'.php'))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        echo view('templates2/header');
        echo view('pages2/'.$page);
        echo view('templates2/footer');
    }

}