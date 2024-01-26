<?php

namespace App\Controllers;

use App\Models\SemproModel;
use CodeIgniter\RESTful\ResourceController;

class SemproRest extends ResourceController
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
        $SemproModel = new SemproModel();
        $data = $SemproModel->where('id_sempro', $id)
            ->get()
            ->getResult();

        if (empty($data)) {
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }

        $dafsempro = $data[0];

        $rawData = $this->request->getRawInput();

        $updateData = [
            'status_sempro' => $rawData['status_sempro'] ?? $dafsempro->status_sempro,
            'hasil_sempro' => $rawData['hasil_sempro'] ?? $dafsempro->hasil_sempro,
        ];

        $SemproModel->update(['id_sempro' => $id], $updateData);

        // Prepare a response
        $response = [
            'sempro_update' => [
                'error' => false,
                'message' => 'success',
                'status_sempro' => $dafsempro->ketrev_sempro,
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
