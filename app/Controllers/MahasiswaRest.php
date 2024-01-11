<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class MahasiswaRest extends ResourceController
{
//    protected $modelName = 'App\Models\MahasiswaModel';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $loginMahasiswa = new MahasiswaModel();
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
                    'id_mhs' => $row['id_mhs'],
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

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $mhsmodel = new MahasiswaModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $mhsmodel->where('id_mhs', $id)
            ->get()
            ->getResult();

        if (!empty($data)) {
            // If the data for the specified ID is found
            $mahasiswa = $data[0]; // Use the first (and only) result

            $user_data = [
                'id_mhs' => $mahasiswa->id_mhs,
                'nim_mhs' => $mahasiswa->nim_mhs,
                'nama_mhs' => $mahasiswa->nama_mhs,
                'alamat_mhs' => $mahasiswa->alamat_mhs,
                'photo_mhs' => $mahasiswa->photo_mhs,
            ];
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'user_data' => $user_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $modelMhs = new MahasiswaModel();
        $nim_mhs = $this->request->getPost("nim_mhs");
        $password_mhs = $this->request->getPost("password_mhs");
        $nama_mhs = $this->request->getPost("nama_mhs");
//        $email_mhs = $this->request->getPost("email_mhs");
//        $alamat_mhs = $this->request->getPost("alamat_mhs");
//        $nohp_mhs = $this->request->getPost("nohp_mhs");

        $hashed_password = password_hash($password_mhs, PASSWORD_BCRYPT);

        $modelMhs->insert([
            'nim_mhs' => $nim_mhs,
            'password_mhs' => $hashed_password,
            'nama_mhs' => $nama_mhs,
//            'email_mhs' => $email_mhs,
//            'alamat_mhs' => $alamat_mhs,
//            'nohp_mhs' => $nohp_mhs,
        ]);

        $user_data = [
            'nim_mhs' => $nim_mhs,
            'nama_mhs' => $nama_mhs,
        ];

        $response = [
            'status' => 201,
            'error' => false,
            'message' => 'success',
            'register_result' => $user_data,
        ];

        return $this->respond($response, 201);
    }



    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $mhsmodel = new MahasiswaModel();
        $data = $mhsmodel->where('id_mhs', $id)
            ->get()
            ->getResult();

        if (empty($data)) {
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }

        $mahasiswa = $data[0];

        $rawData = $this->request->getRawInput();

        $hashedPassword = password_hash($rawData['password_mhs'], PASSWORD_BCRYPT);
        $updateData = [
            'nim_mhs' => $rawData['nim_mhs'] ?? $mahasiswa->nim_mhs,
            'password_mhs' => $hashedPassword,
            'nama_mhs' => $rawData['nama_mhs'] ?? $mahasiswa->nama_mhs,
            'alamat_mhs' => $rawData['alamat_mhs'] ?? $mahasiswa->alamat_mhs,
        ];

        $mhsmodel->update(['id_mhs' => $id], $updateData);

        // Prepare a response
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'success',
            'user_update' => [
                'nim_mhs' => $mahasiswa->nim_mhs,
                'nama_mhs' => $mahasiswa->nama_mhs,
                'alamat_mhs' => $mahasiswa->alamat_mhs,
            ]
        ];

        // Respond with the prepared response
        return $this->respond($response, 200);
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
