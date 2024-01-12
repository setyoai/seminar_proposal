<?php

namespace App\Controllers;

//use App\Controllers\BaseController;

use App\Models\LoginModel;

class Login extends BaseController
{

//    protected $helpers = ['custom'];
    public function index()
    {
        helper('form');
//       return redirect()->to(site_url('login'));
        return view('login/index');
    }

    public function cekUser()
    {
        $username_user = $this->request->getPost('username_user');
        $password_user = $this->request->getPost('password_user');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
           'username_user' => [
               'label' => 'ID User',
               'rules' => 'required',
               'errors' => [
                   'required' => '{field} tidak boleh kosong'
               ]
           ],
            'password_user' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $sessError = [
                'errIdUser' => $validation->getError('username_user'),
                'errPassword' => $validation->getError('password_user')

            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('login/index'));
        } else {
            $loginModel = new LoginModel();
            $cekUserLogin = $loginModel->where('username_user', $username_user)->first();

            if ($cekUserLogin == null ) {
                $sessError = [
                    'errIdUser' => 'Maaf User Tidak Terdaftar',
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login/index'));
            } else {
                $passwordUser = $cekUserLogin['password_user'];

                if (password_verify($password_user, $passwordUser)){
                    // Lanjutkan
                    $lavel_iduser = $cekUserLogin['level_userid'];

                    $save_session = [
                        'id_user' =>  $cekUserLogin['id_user'],
                        'username_user' => $cekUserLogin['username_user'],
                        'level_iduser' => $lavel_iduser
                    ];

                    session()->set($save_session);

                    return redirect()->to('home/index');
                } else {
                    $sessError = [
                        'errPassword' => 'Password Anda Salah',
                    ];

                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('login/index'));
                }

            }
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }

}