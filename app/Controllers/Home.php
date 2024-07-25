<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\TestModel;

class Home extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'My CI4 App',
            'post' => $this->postModel->findAll()
        ];

        return view('index', $data);
    }


    public function login(): string
    {
        $data = [
            'title' => 'Login',
        ];

        return view('login', $data);
    }
}
