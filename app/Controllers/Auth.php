<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        echo view('home');
    }

    public function login() {
        return view('auth/login');
    }

    public function loginProcess() {
        $post = $this->request->getPost();
        $query = $this->db->table('tb_user')->getWhere(['username_user' => $post['email']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password_user)) {
                $params = ['id_user' => $user->id_user];
                session()->set($params);

                return redirect()->to(site_url('home'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        }
        return redirect()->back()->with('error', 'Email tidak ditemukan');

    }

}