<?php

namespace App\Controllers;

use App\Models\DafSemproModel;
use App\Models\DafSkripsiModel;
use App\Models\DetSemproModel;
use App\Models\DosbingModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\RuanganModel;
use App\Models\SemproModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class DetSemproRest extends ResourceController
{
    function __construct()
    {
        $this->tb_sempro = new SemproModel();
        $this->tb_dafsempro = new DafSemproModel();
        $this->tb_dafskripsi = new DafSkripsiModel();
        $this->tb_detsempro = new DetSemproModel();
        $this->tb_mhs = new MahasiswaModel();
        $this->tb_dosen = new DosenModel();
        $this->tb_ruangan = new RuanganModel() ;

    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_detsempro'] = $this->tb_detsempro->getAll();

        if (empty($data)) {
            // If no records are found, respond with a message
            return $this->respond(['message' => 'No records found.'], 404);
        }

        // Prepare a response
        $response = [
            'status' => 200,
            'error' => false,
            'data' => $data,
        ];

        // Respond with the prepared response
        return $this->respond($response, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id_dosen = null)
    {
        $detSemproModel = new DetSemproModel();

        $data = $detSemproModel->getAll($id_dosen); // Assuming getAll fetches all records

        if (!empty($data)) {
            // If data is found
            $detsempro_data = [];

            foreach ($data as $detSempro) {
                $detsempro_data[] = [
                    'id_sempro' => $detSempro->id_sempro,
                    'ketrev_detsempro' => $detSempro->ketrev_detsempro,
                    'level_dosen' => $detSempro->leveldosen_detsempro,
                    'nim_detsempro' => $detSempro->nim_detsempro,
                    'nama_detsempro' => $detSempro->nama_detsempro,
                    'nama_ruangan' => $detSempro->nama_ruangan,
                    'jam_sempro' => $detSempro->jam_sempro,
                    'tanggal_sempro' => $detSempro->tanggal_sempro,
                ];
            }

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'detsempro_data' => $detsempro_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data dengan id_dosen ' . ($id_dosen !== null ? $id_dosen : 'tidak ditemukan'));
        }
    }



    private function getIdDafSkripsi($usernameUser)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('tb_dafskripsi');
        $builder->select('nim_dafskripsi');
        $builder->where('id_dafskripsi', $usernameUser);
        $query = $builder->get();

        if ($query->getResult()) {
            return $query->getRow()->nim_dafskripsi;
        } else {
            return null;
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
        $detSemproModel = new DetSemproModel();
        $data = $detSemproModel->where('id_detsempro', $id)
            ->get()
            ->getResult();

        if (empty($data)) {
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }

        $dafsempro = $data[0];

        $rawData = $this->request->getRawInput();

        $updateData = [
            'ketrev_detsempro' => $rawData['ketrev_detsempro'] ?? $dafsempro->ketrev_detsempro,
        ];

        $detSemproModel->update(['id_detsempro' => $id], $updateData);

        // Prepare a response
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'success',
            'user_update' => [
                'ketrev_detsempro' => $dafsempro->ketrev_detsempro,
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
