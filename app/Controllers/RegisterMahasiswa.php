<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MahasiswaModel;
class RegisterMahasiswa extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $modelMhs = new MahasiswaModel();
        $data = $modelMhs->findAll();
        $response = [
            'status' => 200,
            'error' => "false",
            'message' => '',
            'totaldata' => count($data),
            'data' => $data,
        ];

        return $this->respond($response, 200);
        
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
        $modelMhs = new MahasiswaModel();
        $nim_mhs = $this->request->getPost("nim_mhs");
        $nama_mhs = $this->request->getPost("nama_mhs");
        $password_mhs = $this->request->getPost("password_mhs");
        $email_mhs = $this->request->getPost("email_mhs");
        $alamat_mhs = $this->request->getPost("alamat_mhs");
        $nohp_mhs = $this->request->getPost("nohp_mhs");

        $hashed_password = password_hash($password_mhs, PASSWORD_BCRYPT);

        $modelMhs->insert([
            'nama_mhs' => $nama_mhs,
            'nim_mhs' => $nim_mhs,
            'password_mhs' => $hashed_password,
//            'email_mhs' => $email_mhs,
//            'alamat_mhs' => $alamat_mhs,
//            'nohp_mhs' => $nohp_mhs,
        ]);

        $response = [
            'status' => 201,
            'error' => false,
            'message' => 'success',
        ];

        return $this->respond($response, 201);
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
