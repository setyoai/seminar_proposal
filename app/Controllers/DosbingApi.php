<?php

namespace App\Controllers;

use App\Models\DosbingModel;
use CodeIgniter\RESTful\ResourceController;

class DosbingApi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id_dafskripsi = null)
    {
        $dosbingModel = new DosbingModel();

        $data = $dosbingModel->getAll($id_dafskripsi);

        if (!empty($data)) {
            // If data is found
            $dosbing = $data[0];


            $dosbing_data = [
                'dosbing_id' => $dosbing->id_dosbing,
                'dafskripsiid_dosbing' => $dosbing->dafskripsiid_dosbing,
                'dosen1_dosbing' => $dosbing->dosen1_dosbing,
                'nama1_dosbing' => $dosbing->nama_dosen1,
                'dosen2_dosbing' => $dosbing->dosen2_dosbing,
                'nama2_dosbing' => $dosbing->nama_dosen2,
            ];


            $response = [
                'error' => false,
                'message' => 'success',
                'dosbingmhs_data' => $dosbing_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data dengan id dafskripsi ' . $id . 'tidak ditemukan');
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
