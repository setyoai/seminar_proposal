<?php

namespace App\Controllers;

use App\Models\BimbinganModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class BimbinganRest extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    use ResponseTrait;

    public function index()
    {
        $modelBimbingan = new BimbinganModel();
        $data = $modelBimbingan->findAll();
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($dosbingid_bimbingan = null, $dosenid_bimbingan = null)
    {
        $bimbinganModel = new BimbinganModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $bimbinganModel->where('dosbingid_bimbingan', $dosbingid_bimbingan)
                            ->where('dosenid_bimbingan', $dosenid_bimbingan)
                            ->get()
                            ->getResult();

        if (!empty($data)) {
            // If the data for the specified ID is found
            $bimbingan_data = []; // Use the first (and only) result

            foreach ($data as $bimbingan) {
                $bimbingan_data[] = [
                    'tanggal_bimbingan' => (new DateTime($bimbingan->created_at))->format('d M Y, H:i'),
                    'ket_bimbingan' => $bimbingan->ket_bimbingan,
                    'balasanket_bimbingan' => $bimbingan->balasanket_bimbingan,
                    'balasantanggal_bimbingan' => (new DateTime($bimbingan->updated_at))->format('d M Y, H:i'),

                ];
            }

            $response = [
                'bimbingan_data' => $bimbingan_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            $response = [
                'bimbingan_data' => [
                    'tanggal_bimbingan' => null,
                    'ket_bimbingan' => null,
                ],
            ];

            return $this->respond($response, 404);
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
                ['ket_bimbingan' => $this->request->getPost('ket_bimbingan')],
                ['dosenid_bimbingan' => $this->request->getPost('dosenid_bimbingan')]
            );
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
        $file->move('upload/bimbingan');

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
    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param int|null $id
     * @return mixed
     * @throws \ReflectionException
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
