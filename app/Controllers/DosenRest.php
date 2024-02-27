<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class DosenRest extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $dosenmodel = new DosenModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $dosenmodel->where('id_dosen', $id)
            ->get()
            ->getResult();

        if (!empty($data)) {
            // If the data for the specified ID is found
            $dosen = $data[0]; // Use the first (and only) result

            $role = "dosen";
            $dosen_data = [
                'id_dosen' => $dosen->id_dosen,
                'nidn_dosen' => $dosen->nidn_dosen,
                'nama_dosen' => $dosen->nama_dosen,
                'alamat_dosen' => $dosen->alamat_dosen,
                'nohp_dosen' => $dosen->nohp_dosen,
                'email_dosen' => $dosen->email_dosen,
                'role' => $role
            ];
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'dosen_data' => $dosen_data,
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
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $dosenModel = new DosenModel();

        $dataDosen = $dosenModel->where('id_dosen', $id)
            ->get()
            ->getResult();

        if (empty($dataDosen)) {
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }

        $dosen = $dataDosen[0];

        $userModel = new UserModel();

        $dataUser = $userModel->getUserById($id);

        if (empty($dataUser)) {
            return $this->failNotFound('Maaf data user tidak Ditemukan');
        }

        $user = $dataUser[0];

        $rawData = $this->request->getRawInput();

        $updateData = [
            'nidn_dosen' => $rawData['nidn_dosen'] ?? $dosen->nidn_dosen,
            'nama_dosen' => $rawData['nama_dosen'] ?? $dosen->nama_dosen,
            'alamat_dosen' => $rawData['alamat_dosen'] ?? $dosen->alamat_dosen,
            'nohp_dosen' => $rawData['nohp_dosen'] ?? $dosen->nohp_dosen,
            'email_dosen' => $rawData['email_dosen'] ?? $dosen->email_dosen,

        ];

        $dosenModel->update(['id_dosen' => $id], $updateData);

        $hashedPassword = password_hash($rawData['password_user'], PASSWORD_BCRYPT);
        $updateDataDosen = [
            'password_user' => $hashedPassword ?? $user[0]->password_user,
        ];

        $userModel->update(['id_user' => $user->id_user], $updateDataDosen);

        // Prepare a response
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'success',
            'dosen_update' => [
                'nidn_dosen' => $dosen->nidn_dosen,
                'nama_dosen' => $dosen->nama_dosen,
                'alamat_dosen' => $dosen->alamat_dosen,
                'nohp_dosen' => $dosen->nohp_dosen,
                'email_dosen' => $dosen->email_dosen,
            ]
        ];

        // Respond with the prepared response
        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
