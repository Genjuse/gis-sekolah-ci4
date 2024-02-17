<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
protected $ModelAuth;
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth;
    }

    public function Login()
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
        ])) {
            //jika login 
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $CekLogin = $this->ModelAuth->Login($username, $password);
            if ($CekLogin) {
                # jika berhasil Login
                session()->set('nama_user', $CekLogin['nama_user']);
                session()->set('foto', $CekLogin['foto']);
                session()->set('login', 1);
                session()->set('privilege', $CekLogin['privilege']);
                session()->set('npsn', $CekLogin['npsn']);
                return redirect()->to('Admin');
            } else {
                # jika gagal login...
                session()->setFlashdata('pesan', 'Email Atau Password Salah');
                return redirect()->to('Auth/Login');
            }
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Auth/Login')->withInput('validation', \Config\Services::validation());
        }
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('foto');
        session()->remove('login');
        session()->setFlashdata('logout', 'Anda Berhasil LogOut');
        return redirect()->to('Auth/Login');
    }
}
