<?php

namespace App\Controllers;

use App\Models\DafSkripsiModel;
use App\Models\DosbingModel;
use CodeIgniter\RESTful\ResourceController;

class DafSkripsiRest extends ResourceController
{
//    protected $modelName = 'App\Models\DafSkripsiModel';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'error' => false,
            'data_dafskripsi' => $this->model->getAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $modelDafSem = new DafSkripsiModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $modelDafSem->where('nim_dafskripsi', $id)
            ->get()
            ->getResult();

        if (!empty($data)) {
            // If the data for the specified ID is found
            $dafskripsi = $data[0]; // Use the first (and only) result

            $dafskripsi_data = [
                'id_dafskripsi' => $dafskripsi->id_dafskripsi,
                'nim_dafskripsi' => $dafskripsi->nim_dafskripsi,
                'krs_dafskripsi' => $dafskripsi->krs_dafskripsi,
                'transkrip_dafskripsi' => $dafskripsi->transkrip_dafskripsi,
                'slippembayaran_dafskripsi' => $dafskripsi->slippembayaran_dafskripsi,
                'status_dafskripsi' => $dafskripsi->status_dafskripsi,
                'keterangan_dafskripsi' => $dafskripsi->keterangan_dafskripsi,
            ];
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'dafskripsi_data' => $dafskripsi_data,
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
        try {
            // Instantiate both models
            $modelDafSem = new DafSkripsiModel();
            $modelDosbing = new DosbingModel();

            $uploadedFiles = [];

            // List of allowed file fields
            $allowedFields = [
                'id_dafskripsi',
                'nim_dafskripsi',
                'krs_dafskripsi',
                'transkrip_dafskripsi',
                'slippembayaran_dafskripsi',
            ];

            foreach ($allowedFields as $fieldName) {
                // Validate and move each file if present in the request
                if ($this->request->getFile($fieldName)) {
                    $uploadedFiles[$fieldName] = $this->validateAndMoveFile($fieldName)->getName();
                }
            }

            $nimDafskripsi = $this->request->getPost('nim_dafskripsi');
            if ($modelDafSem->where('nim_dafskripsi', $nimDafskripsi)->first() !== null) {
                // If nim_dafskripsi already exists, throw an exception
                throw new \Exception("nim_dafskripsi '$nimDafskripsi' already exists");
            }

            // Save file names to the first table (DafSkripsiModel)
            $dataDafSem = array_merge(['nim_dafskripsi' => $nimDafskripsi], $uploadedFiles);
            $modelDafSem->insert($dataDafSem);

            // Additional data for the second table (DosbingModel)
            $dataDosbing = [
                'dafskripsiid_dosbing' => $modelDafSem->getInsertID(),
            ];

            // Save data to the second table (DosbingModel)
            $modelDosbing->insert($dataDosbing);

            $response = [
                'error' => false,
                'message' => 'success',
                'upload_result' => [
                        'id_dafskripsi' => $modelDafSem->getInsertID(),
                ] + $uploadedFiles,
            ];

            // Return a success response
            return $this->respondCreated($response, 200);
        } catch (\Exception $e) {
            // Handle any exceptions or errors that may occur
            $response = [
                'error' => true,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ];

            // Return an error response
            return $this->respond($response, 500);
        }
    }

    private function validateAndMoveFile($fieldName)
    {
        $file = $this->request->getFile($fieldName);

        // Check if the file is present in the request
        if (!$file) {
            throw new \Exception("File $fieldName not found in the request");
        }

        // Check if the file is valid
        if (!$file->isValid()) {
            throw new \Exception("Invalid $fieldName file");
        }

        // Move the file to the 'upload' directory
        $file->move('upload');

        return $file;
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
