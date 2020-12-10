<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BlogModel;

class Blog extends Controller
{

    public function post($slug)
    {
        $blogModel = new BlogModel;
        $data['post'] = $blogModel->getPosts($slug);

        echo view('templates2/header');
        echo view('blog/post', $data);
        echo view('templates2/footer');
    }

    public function create()
    {
        helper('form');
        $blogModel = new BlogModel;

        if (!$this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ]))
        {
            echo view('templates2/header');
            echo view('blog/create');
            echo view('templates2/footer');
        }
        else
        {
            $blogModel->save([
                'title' => $this->request->getVar('title'),
                'body'  => $this->request->getVar('body'),
                'slug'  => url_title($this->request->getVar('title'))
            ]);

            $session = session();
            $session->setFlashdata('success', 'New post was created!');

            return redirect()->to('/');
        }
    }

}