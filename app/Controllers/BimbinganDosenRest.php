<?php

namespace App\Controllers;

use App\Models\BimbinganModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class BimbinganDosenRest extends ResourceController
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
    public function show($dosenid_bimbingan = null)
    {
        $dosbingModel = new BimbinganModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $dosbingModel ->getAll($dosenid_bimbingan);

        if (!empty($data)) {
            // If the data for the specified ID is found
            $dosbing_data = []; // Use the first (and only) result

            foreach ($data as $dosbing) {
                $dosbing_data[] = [
                    'id_bimbingan' => $dosbing->id_bimbingan,
                    'mhsnim_bimbingan' => $dosbing->mhsnim_bimbingan,
                    'nama_bimbingan' => $dosbing->nama_mhs,
                    'tanggal_bimbingan' => (new DateTime($dosbing->tanggal_bimbingan))->format('d M Y, H:i'),
                    'ket_bimbingan' => $dosbing->ket_bimbingan,
                    'balasanket_bimbingan' => $dosbing->balasanket_bimbingan,
                    'balasantanggal_bimbingan' => (new DateTime($dosbing->tanggalbalasan_bimbingan))->format('d M Y, H:i'),

                ];
            }

            $response = [
                'bimbingandosen_data' => $dosbing_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data dengan id_dosen ' . ($dosenid_bimbingan !== null ? $dosenid_bimbingan : 'tidak ditemukan'));
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
        $bimbinganModel = new BimbinganModel();

        // Retrieve data from the 'tb_detsempro' table
        $dataBimbingan = $bimbinganModel->where('id_bimbingan', $id)
            ->get()
            ->getResult();

        if (empty($dataBimbingan)) {
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }

        $bimbingan = $dataBimbingan[0];

        $rawData = $this->request->getRawInput();

        // Update data for 'tb_detsempro'
        $updateDataBimbingan = [
            'balasanket_bimbingan' => $rawData['balasanket_bimbingan'] ?? $bimbingan->balasanket_bimbingan,
        ];

        $bimbinganModel->update(['id_bimbingan' => $id], $updateDataBimbingan);

        // Prepare a response
        $response = [
            'update_status' => [
                'error' => false,
                'message' => 'success',
                'balasanket_bimbingan' => $bimbingan->balasanket_bimbingan,
            ]
        ];

        // Respond with the prepared response
        return $this->respond($response, 200);
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
        $file->move('upload/bimbingan');

        return $file;
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
