<?php

namespace App\Controllers;

use App\Models\DafSemproModel;
use App\Models\DafSkripsiModel;
use App\Models\DetSemproModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\RuanganModel;
use App\Models\SemproModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class MahasiswaSemproRest extends ResourceController
{
    function __construct()
    {
        $this->tb_sempro = new SemproModel();
        $this->tb_dafsempro = new DafSemproModel();
        $this->tb_dafskripsi = new DafSkripsiModel();
        $this->tb_detsempro = new DetSemproModel();
        $this->tb_mahasiswa = new MahasiswaModel();
        $this->tb_dosen = new DosenModel();
        $this->tb_ruangan = new RuanganModel() ;

    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
//        $data['tb_detsempro'] = $this->tb_detsempro->getAll();
//
//        if (empty($data)) {
//            // If no records are found, respond with a message
//            return $this->respond(['message' => 'No records found.'], 404);
//        }
//
//        // Prepare a response
//        $response = [
//            'status' => 200,
//            'error' => false,
//            'data' => $data,
//        ];
//
//        // Respond with the prepared response
//        return $this->respond($response, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id_dafsempro = null)
    {
        $semproModel = new SemproModel();

        $data = $semproModel->getAllMhs($id_dafsempro); // Assuming getAll fetches all records

        if (!empty($data)) {
            // If data is found, get the first item
            $sempro = $data[0];

            $formattedSempro = [
                'id_dafsempro' => $sempro->id_dafsempro,
                'id_sempro' => $sempro->id_sempro,
                'nim_sempro' => $sempro->nim_sempro,
                'nama_sempro' => $sempro->nama_sempro,
                'nama_ruangan' => $sempro->nama_ruangan,
                'ketua_penguji' => $semproModel->getDosenNameById($sempro->penguji1_sempro),
                'anggota_penguji1' => $semproModel->getDosenNameById($sempro->penguji2_sempro),
                'anggota_penguji2' => $semproModel->getDosenNameById($sempro->penguji3_sempro),
                'jam_sempro' => $sempro->jam_sempro,
                'hasil_sempro' => $sempro->hasil_sempro,
                'status_sempro' => $sempro->status_sempro,
                'tanggal_sempro' => (new DateTime($sempro->tanggal_sempro))->format('d M Y'),
                'tanggal_dafsempro' => (new DateTime($sempro->tanggal_sempro))->format('d M Y'),
            ];

            $response = [
                'error' => false,
                'message' => 'success',
                'sempro_mhs_data' => $formattedSempro,
            ];

            return $this->respond($response, 200);

        } else {
            // If no result found, return a 404 response
            return $this->failNotFound('Maaf data dengan id_dafsempro ' . ($id_dafsempro  !== null ? $id_dafsempro  : 'tidak ditemukan'));
        }
    }


    /**
     * Return a new resource object, with default properties
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
