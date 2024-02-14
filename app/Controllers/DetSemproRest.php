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
use DateTime;

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
                    'id_detsempro' => $detSempro->id_detsempro,
                    'id_sempro' => $detSempro->id_sempro,
                    'level_dosen' => $detSempro->leveldosen_detsempro,
                    'nim_detsempro' => $detSempro->nim_detsempro,
                    'nama_detsempro' => $detSempro->nama_detsempro,
                    'nama_ruangan' => $detSempro->nama_ruangan,
                    'judul_dafsempro' => $detSempro->judul_dafsempro,
                    'jam_sempro' => $detSempro->jam_sempro,
                    'hasil_sempro' => $detSempro->hasil_sempro,
                    'status_sempro' => $detSempro->status_sempro,
                    'status_dafsempro' => $detSempro->status_dafsempro,
                    'tanggal_sempro' => (new DateTime($detSempro->tanggal_sempro))->format('d M Y'),
                    'tanggal_dafsempro' => (new DateTime($detSempro->tanggal_dafsempro))->format('d M Y'),
                ];
            }

            $response = [
                'detsempro_data' => $detsempro_data,
            ];

            return $this->respond($response, 200);
        } else {
            // If no result found, return a 404 response
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
        $detSemproModel = new DetSemproModel();
        $semproModel = new SemproModel();

        // Retrieve data from the 'tb_detsempro' table
        $dataDetSempro = $detSemproModel->where('id_detsempro', $id)
            ->get()
            ->getResult();

        if (empty($dataDetSempro)) {
            return $this->failNotFound('Maaf data ' . $id . ' tidak Ditemukan');
        }

        $dafsempro = $dataDetSempro[0];

        // Retrieve data from the 'tb_sempro' table
        $dataSempro = $semproModel->where('id_sempro', $dafsempro->id_sempro)
            ->get()
            ->getResult();

        if (empty($dataSempro)) {
            return $this->failNotFound('Maaf data sempro tidak Ditemukan');
        }

        $rawData = $this->request->getRawInput();

        // Update data for 'tb_detsempro'
        $updateDataDetSempro = [
            'judul' => $rawData['judul'] ?? $dafsempro->judul,
            'latar_belakang' => $rawData['latar_belakang'] ?? $dafsempro->latar_belakang,
            'rumusan_masalah' => $rawData['rumusan_masalah'] ?? $dafsempro->rumusan_masalah,
            'batasan_masalah' => $rawData['batasan_masalah'] ?? $dafsempro->batasan_masalah,
            'tujuan' => $rawData['tujuan'] ?? $dafsempro->tujuan,
            'manfaat' => $rawData['manfaat'] ?? $dafsempro->manfaat,
            'tinjauan pustaka' => $rawData['tinjauan pustaka'] ?? $dafsempro->tinjauan_pustaka,
            'metodologi' => $rawData['metodologi'] ?? $dafsempro->metodologi,
            'kerangka_pemikiran' => $rawData['kerangka_pemikiran'] ?? $dafsempro->kerangka_pemikiran,
            'jadwal_kegiatan' => $rawData['jadwal_kegiatan'] ?? $dafsempro->jadwal_kegiatan,
            'riwayat_penilitian' => $rawData['riwayat_penilitian'] ?? $dafsempro->riwayat_penilitian,
            'daftar_pustaka' => $rawData['daftar_pustaka'] ?? $dafsempro->daftar_pustaka,
        ];

        $detSemproModel->update(['id_detsempro' => $id], $updateDataDetSempro);

        // Update data for 'tb_sempro'
        $updateDataSempro = [
            'status_sempro' => $rawData['status_sempro'] ?? $dataSempro[0]->status_sempro,
            'hasil_sempro' => $rawData['hasil_sempro'] ?? $dataSempro[0]->hasil_sempro,
            // Add other fields to update in 'tb_sempro' if needed
        ];

        $semproModel->update(['id_sempro' => $dafsempro->id_sempro], $updateDataSempro);

        // Prepare a response
        $response = [
            'update_status' => [
                'error' => false,
                'message' => 'success',
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
