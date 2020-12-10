<?php namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{

    public function index()
    {
        $model = new NewsModel;

        $data['news'] = $model->getNews();
        $data['title'] = 'News archive';

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null)
    {
        $model = new NewsModel;
        
        $data['news'] = $model->getNews($slug);

        if (empty($data['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '.$slug);
        }

        $data['title'] = $data['news']['slug'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = new NewsModel;
        $isValid = $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ]);

        if ($this->request->getMethod() === 'post' && $isValid)
        {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
                'body'  => $this->request->getPost('body')
            ]);

            echo view('news/success');
        }
        else
        {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }

}