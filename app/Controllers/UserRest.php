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

        if (count($cekUser->getResultArray()) > 0 ) {

            $row = $cekUser->getRowArray();
            $password_hash = $row['password_user'];

            if (password_verify($password_user, $password_hash)) {
                $issuedate_claim = time();
                $expire_time = $issuedate_claim + (24 * 60 * 60);

                $token = [
                    'iat' => $issuedate_claim,
                    'exp' => $expire_time
                ];

                $token = JWT::encode($token, getenv("TOKEN_KEY"), 'HS256');

                $role = "dosen";
                foreach ($users as $user) {
                    // Akses informasi nama dosen
                    $namaDosen = $user->nama_user;
                }

                $user_data = [
                    'token' => $token,
                    'username_user' => $username_user,
                    'id_user' => $row['id_user'],
                    'nama_dosen' => $namaDosen,
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
        $usermodel = new UserModel();
        $users = $usermodel->getAll();

        // Querying the MahasiswaModel for a specific ID
        $data = $usermodel->where('id_user', $id)
            ->get()
            ->getResult();

        foreach ($users as $user) {
            // Akses informasi nama dosen
            $namaDosen = $user->nama_user;
        }

        if (!empty($data)) {
            // If the data for the specified ID is found
            $user = $data[0]; // Use the first (and only) result

            $user_dosen = [
                'id_user' => $user->id_user,
                'username' => $user->username_user,
                'nama' => $namaDosen
            ];
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'user_dosen' => $user_dosen,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
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
