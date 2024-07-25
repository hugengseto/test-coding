<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthController extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new AuthModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Login'
        ];

        return view('login', $data);
    }

    public function auth()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');

        $validation = Services::validation();
        $validation->setRules([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ]
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to(base_url('/login'))->withInput()->with('errors', $validation->getErrors());
        }

        $data = $this->modelUser->getDataByUsername($username);

        if ($data) {
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                $ses_data = [
                    'username'  => $data->username,
                    'logged_in' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to(base_url('/'));
            } else {
                $session->setFlashdata('message', 'Username or Password is wrong!.');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('message', 'Username or Password is wrong!.');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}
