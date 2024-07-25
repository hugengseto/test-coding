<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use Config\Services;

class PostController extends BaseController
{

    protected $modelPost;

    public function __construct()
    {
        $this->modelPost = new PostModel();
    }

    public function index()
    {
        $data = [
            'title' => 'post',
            'post' => $this->modelPost->findAll()
        ];

        return view('post/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Create post',
        ];

        return view('post/tambah', $data);
    }

    public function aksi_tambah()
    {
        $session = session();

        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $validation = Services::validation();
        $validation->setRules([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title tidak boleh kosong'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Content tidak boleh kosong'
                ]
            ]
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to(base_url('/tambahpost'))->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'title' => $title,
            'content' => $content,
            'username' => $session->get('username'),
            'date'  => new Time()
        ];

        $this->modelPost->save($data);

        $getdatapost = $this->modelPost->where(['title' => $title, 'username' => $data['username']])->find();

        return redirect()->to(base_url('/detailpost/' . $getdatapost['idpost']))->withInput()->with('errors', $validation->getErrors());
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Create post',
            'post' => $this->modelPost->find($id)
        ];

        return view('post/detail', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Create post',
        ];

        return view('post/edit', $data);
    }
}
