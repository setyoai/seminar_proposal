<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class UserRest extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $loginUser = new UserModel();
        $users = $loginUser->getAll();
        $username_user = $this->request->getVar("username_user");
        $password_user = $this->request->getVar("password_user");

        $cekUser = $loginUser->cekLogin($username_user);

        if ($cekUser) {
            $password_hash = $cekUser->password_user;

            if (password_verify($password_user, $password_hash)) {
                $issuedate_claim = time();
                $expire_time = $issuedate_claim + (24 * 60 * 60);

                $token = [
                    'iat' => $issuedate_claim,
                    'exp' => $expire_time
                ];

                $token = JWT::encode($token, getenv("TOKEN_KEY"), 'HS256');

                $role = "dosen";

                $user_data = [
                    'token' => $token,
                    'username_user' => $username_user,
                    'id_user' => $cekUser->id_user,
                    'id_dosen' => $cekUser->id_dosen,
                    'role' => $role
                ];

                // Prepare the login result array
                $login_result = [
                    'error' => false,
                    'message' => 'success',
                    'login_result' => $user_data,
                ];

                return $this->respond($login_result, 200);

            } else {
                return $this->failNotFound("Maaf user/password anda salah");
            }

        } else {
            return $this->failNotFound("Maaf user/password anda salah");
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $userModel = new UserModel();
        $userData = $userModel->find($id);

        if (!empty($userData)) {
            // Use $userData directly as an object
            $namaDosen = $this->getNamaDosen($userData->username_user);

            // Manipulate $namaDosen to remove additional qualifications
            $namaDosen = strtok($namaDosen, ',');

            $userDetails = [
                'id_user' => $userData->id_user,
                'username' => $userData->username_user,
                'nama_dosen' => $namaDosen,
            ];

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'user_details' => $userDetails,
            ];

            return $this->respond($response, 200);
        } else {
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }
    }

    private function getNamaDosen($usernameUser)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('tb_dosen');
        $builder->select('nama_dosen');
        $builder->where('nidn_dosen', $usernameUser);
        $query = $builder->get();

        if ($query->getResult()) {
            return $query->getRow()->nama_dosen;
        } else {
            return null;
        }
    }



    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
