<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LoginMahasiswaModel;
use Firebase\JWT\JWT;

class Loginmahasiswa extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $loginMahasiswa = new LoginMahasiswaModel();
        $nim_mhs = $this->request->getVar("nim_mhs");
        $password_mhs = $this->request->getVar("password_mhs");

        $cekUser = $loginMahasiswa->cekLogin($nim_mhs);

        if (count($cekUser->getResultArray()) > 0 ) {

            $row = $cekUser->getRowArray();
            $password_hash = $row['password_mhs'];

            if (password_verify($password_mhs, $password_hash)) {
                $issuedate_claim = time();
                $expire_time = $issuedate_claim + (24 * 60 * 60);

                $token = [
                    'iat' => $issuedate_claim,
                    'exp' => $expire_time
                ];

                $token = JWT::encode($token, getenv("TOKEN_KEY"), 'HS256');

                $user_data = [
                    'token' => $token,
                    'nim_mhs' => $nim_mhs,
                    'email_mhs' => $row['email_mhs'],
                    'nama_mhs' => $row['nama_mhs'],
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
}
