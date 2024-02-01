<?php

namespace App\Controllers;

use App\Models\DetSemproModel;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class DosbingRest extends ResourceController
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
    public function show($id_dosen = null)
    {
        $dosbingModel = new DetSemproModel();

        $data = $dosbingModel->getAll($id_dosen);

        if (!empty($data)) {
            $dosbing_data = [];

            foreach ($data as $dosbing) {
                // Exclude records where level_dosen is "Ketua Penguji"
                if ($dosbing->leveldosen_detsempro != 'Ketua Penguji') {
                    $dosbing_data[] = [
                        'level_dosen' => $dosbing->leveldosen_detsempro,
                        'nim_dosbing' => $dosbing->nim_detsempro,
                        'nama_dosbing' => $dosbing->nama_detsempro,
                        'jam_sempro' => $dosbing->jam_sempro,
                        'nama_ruangan' => $dosbing->nama_ruangan,
                        'hasil_sempro' => $dosbing->hasil_sempro,
                        'tanggal_sempro' => (new DateTime($dosbing->tanggal_sempro))->format('d M Y'),
                        'tanggal_dafsempro' => (new DateTime($dosbing->tanggal_dafsempro))->format('d M Y'),
                        'status_dafsempro' => $dosbing->status_dafsempro,
                    ];
                }
            }

            $response = [
                'dosbing_data' => $dosbing_data,
            ];

            return $this->respond($response, 200);
        } else {
            return $this->failNotFound('Maaf data dengan id_dosen ' . ($id_dosen !== null ? $id_dosen : 'tidak ditemukan'));
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
