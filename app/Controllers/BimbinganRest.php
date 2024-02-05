<?php

namespace App\Controllers;

use App\Models\BimbinganModel;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class BimbinganRest extends ResourceController
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
        $bimbinganModel = new BimbinganModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $bimbinganModel->where('mhsnim_bimbingan', $id)
            ->get()
            ->getResult();

        if (!empty($data)) {
            // If the data for the specified ID is found
            $bimbingan_data = []; // Use the first (and only) result

            foreach ($data as $bimbingan) {
                $bimbingan_data[] = [
                    'tanggal_bimbingan' => (new DateTime($bimbingan->tanggal_bimbingan))->format('d M Y, H:i'),
                    'ket_bimbingan' => $bimbingan->ket_bimbingan,
                    'balasanket_bimbingan' => $bimbingan->balasanket_bimbingan,
                    'balasantanggal_bimbingan' => $bimbingan->balasantanggal_bimbingan,

                ];
            }

            $response = [
                'bimbingan_data' => $bimbingan_data,
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
            $modelBimbingan = new BimbinganModel();
            $bimbinganFiles = [];

            $allowedFields = [
                'dosbingid_bimbingan',
                'mhsnim_bimbingan',
                'bab_bimbingan',
                'ket_bimbingan',
                'file_bimbingan',
                'tanggal_bimbingan',
                'dosenid_bimbingan',
                'balasanfile_bimbingan',
                'balasanket_bimbingan',
                'balasantanggal_bimbingan',
                'status_bimbingan'
            ];

            foreach ($allowedFields as $fieldName) {
                // Validate and move each file if present in the request
                if ($this->request->getFile($fieldName)) {
                    $bimbinganFiles[$fieldName] = $this->validateAndMoveFile($fieldName)->getName();
                }
            }

            $idBimbingan = $this->request->getPost('id_bimbingan');
            if ( $modelBimbingan->where('id_bimbingan', $idBimbingan)->first() !== null) {
                // If id_bimbingan already exists, throw an exception
                throw new \Exception("id_bimbingan '$idBimbingan' already exists");
            }

            // Save file names to the database
            $data = array_merge(
                ['id_bimbingan' => $this->request->getPost('id_bimbingan')],
                $bimbinganFiles,
                ['dosbingid_bimbingan' => $this->request->getPost('dosbingid_bimbingan')],
                ['mhsnim_bimbingan' => $this->request->getPost('mhsnim_bimbingan')],
                ['file_bimbingan' => $this->request->getPost('file_bimbingan')],
                ['ket_bimbingan' => $this->request->getPost('ket_bimbingan')]);
            $modelBimbingan->insert($data);

            $response = [
                'error' => false,
                'message' => 'success',
                'bimbingan_result' => [
//                    'bimbingan_files' => $uploadedFiles,
                    'tanggal_bimbingan' => date('d M Y, H:i'),
                    'ket_bimbingan' => $this->request->getPost('ket_bimbingan')
                ],
            ];
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
        try {
            $modelBimbingan = new BimbinganModel();
            $bimbinganFiles = [];

            $allowedFields = [
                'dosbingid_bimbingan',
                'mhsnim_bimbingan',
                'bab_bimbingan',
                'ket_bimbingan',
                'file_bimbingan',
                'tanggal_bimbingan',
                'dosenid_bimbingan',
                'balasanfile_bimbingan',
                'balasanket_bimbingan',
                'balasantanggal_bimbingan',
                'status_bimbingan'
            ];

            foreach ($allowedFields as $fieldName) {
                // Validate and move each file if present in the request
                if ($this->request->getFile($fieldName)) {
                    $bimbinganFiles[$fieldName] = $this->validateAndMoveFile($fieldName)->getName();
                }
            }

            // Check if the specified ID exists
            $existingBimbingan = $modelBimbingan->find($id);
            if (empty($existingBimbingan)) {
                return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
            }

            // Update the existing record
            $data = array_merge(
                $bimbinganFiles,
                [
                    'balasanfile_bimbingan' => $this->request->getPost('balasanfile_bimbingan'),
                    'balasanket_bimbingan' => $this->request->getPost('balasanket_bimbingan'),
                    'balasantanggal_bimbingan' => $this->request->getPost('balasantanggal_bimbingan'),
                ]
            );

            $modelBimbingan->update($id, $data);

            $response = [
                'error' => false,
                'message' => 'success',
                'bimbingan_result' => [
                    'tanggal_bimbingan' => date('d M Y, H:i'),
                    'balasanket_bimbingan' => $this->request->getPost('balasanket_bimbingan')
                ],
            ];
            return $this->respond($response, 200);
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
