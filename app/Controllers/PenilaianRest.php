<?php

namespace App\Controllers;

use App\Models\DetSemproModel;
use CodeIgniter\RESTful\ResourceController;

class PenilaianRest extends ResourceController
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
    public function show($id_sempro = null)
    {
        $detSemproModel = new DetSemproModel();

        $data = $detSemproModel->getAllPenilaian($id_sempro); // Assuming getAll fetches all records

        if (!empty($data)) {
            // If data is found
            $detsempro_data = [];

            foreach ($data as $detSempro) {
                $detsempro_data[] = [
                    'nim_detsempro' => $detSempro->nim_detsempro,
                    'nama_detsempro' => $detSempro->nama_detsempro,
                    'level_dosen' => $detSempro->leveldosen_detsempro,
                    'nama_dosen' => $detSempro->namadosen_detsempro,
                    'judul' => $detSempro->judul,
                    'latar_belakang' => $detSempro->latar_belakang,
                    'rumusan_masalah' => $detSempro->rumusan_masalah,
                    'batasan_masalah' => $detSempro->batasan_masalah,
                    'tujuan' => $detSempro->tujuan,
                    'manfaat' => $detSempro->manfaat,
                    'tinjauan pustaka' => $detSempro->tinjauan_pustaka,
                    'metodologi' => $detSempro->metodologi,
                    'kerangka_pemikiran' => $detSempro->kerangka_pemikiran,
                    'jadwal_kegiatan' => $detSempro->jadwal_kegiatan,
                    'riwayat_penilitian' => $detSempro->riwayat_penilitian,
                    'daftar_pustaka' => $detSempro->daftar_pustaka,
                    'hasil_sempro' => $detSempro->hasil_sempro,
                    'status_sempro' => $detSempro->status_sempro,
                ];
            }

            $response = [
                'detpenilaian_data' => $detsempro_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data dengan id_sempro ' . ($id_sempro !== null ? $id_sempro : 'tidak ditemukan'));
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
