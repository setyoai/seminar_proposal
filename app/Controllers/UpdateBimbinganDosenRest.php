<?php

namespace App\Controllers;

use App\Models\BimbinganDosenModel;
use App\Models\BimbinganModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class UpdateBimbinganDosenRest extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;

    protected $allowedFields = [
        'id_bimbingan',
        'dosbingid_bimbingan',
        'mhsnim_bimbingan',
        'bab_bimbingan',
        'ket_bimbingan',
        'tanggal_bimbingan',
        'dosenid_bimbingan',
        'balasanket_bimbingan',
        'balasantanggal_bimbingan',
        'status_bimbingan'
    ];
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id_bimbingan = null)
    {
        $dosbingModel = new BimbinganDosenModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $dosbingModel ->getAll($id_bimbingan);

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
                'update_bimbingandosen_data' => $dosbing_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data dengan id_bimbingan ' . ($id_bimbingan !== null ? $id_bimbingan : 'tidak ditemukan'));
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
                $modelBimbingan = new BimbinganModel();
        $json = $this->request->getJSON();

        if ($json && isset($json->balasanket_bimbingan)) {
            $data = [
                'balasanket_bimbingan' => $json->balasanket_bimbingan,
            ];
        } else {
            $input = $this->request->getRawInput();
            if(isset($input['balasanket_bimbingan'])){
                $data = [
                    'balasanket_bimbingan' => $input['balasanket_bimbingan'],
                ];
            } else {
                // Handle the case when 'balasanket_bimbingan' key is not present
                $response = [
                    'status'   => 400,
                    'error'    => 'Invalid input',
                    'messages' => [
                        'error' => 'balasanket_bimbingan key is missing'
                    ]
                ];
                return $this->respond($response);
            }
        }

        // Update data in the database
        $modelBimbingan->update_bimbingan($id, $data);

        $response = [
            'status'   => 200,
            'error'    => null,

            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
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
