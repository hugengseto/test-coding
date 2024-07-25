<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AkunController extends BaseController
{
    protected $modelAkun;

    public function __construct()
    {
        $this->modelAkun = new AuthModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Akun',
            'post' => $this->modelAkun->findAll()
        ];

        return view('akun/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Create account',
        ];

        return view('akun/tambah', $data);
    }

    public function aksi_tambah()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $name = $this->request->getPost('name');
        $role = $this->request->getPost('role');

        $validation = Services::validation();
        $validation->setRules([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to(base_url('/tambahpost'))->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'role' => $role,
        ];

        $this->modelAkun->save($data);

        return redirect()->to(base_url('/akun'))->withInput()->with('errors', $validation->getErrors());
    }
}
