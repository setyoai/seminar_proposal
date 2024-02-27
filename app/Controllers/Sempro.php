<?php

namespace App\Controllers;

use App\Models\DafSemproModel;
use App\Models\DafSkripsiModel;
use App\Models\DetSemproModel;
use App\Models\DosbingModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use App\Models\SemproModel;
use App\Models\MahasiswaModel;
use App\Models\RuanganModel;
use App\Models\DosenModel;

class Sempro extends ResourceController
{
    protected $helpers = ['custom'];


    function __construct()
    {
        $this->tb_sempro = new SemproModel();
        $this->tb_dafsempro = new DafSemproModel();
        $this->tb_detsempro = new DetSemproModel();
        $this->tb_dafskripsi = new DafSkripsiModel();
        $this->tb_mahasiswa = new MahasiswaModel();
        $this->tb_dosen = new DosenModel();
        $this->tb_user = new UserModel();
        $this->tb_dosbing = new DosbingModel();
        $this->tb_ruangan = new RuanganModel() ;

    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['dosbingModel'] = new \App\Models\DosbingModel();
        $data['tb_dafsempro'] = $this->tb_dafsempro->getAll();
        $data['tb_sempro'] = $this->tb_sempro->getAll();
        return view('sempro/index' ,$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['tb_dafsempro'] = $this->tb_dafsempro->getAll();
        $data['tb_dafskripsi'] = $this->tb_dafskripsi->findAll();
        $data['tb_dosen'] = $this->tb_dosen->findAll();
        $data['tb_ruangan'] = $this->tb_ruangan->findAll();
        $data['tb_sempro'] = $this->tb_sempro->getAll();
        return view('sempro/new' ,$data);
    }

//    /**
//     * Return a new resource object, with default properties
//     *
//     * @return mixed
//     */
//    public function new()
//    {
//        $data['tb_dafsempro'] = $this->tb_dafsempro->getAll();
//        $data['tb_dosen'] = $this->tb_dosen->findAll();
//        $data['tb_ruangan'] = $this->tb_ruangan->findAll();
//        $data['tb_sempro'] = $this->tb_sempro->getAll();
//        return view('sempro/new' ,$data);
//    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->tb_sempro->insert($data);
        return redirect()->to(site_url('sempro'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data['dosbingModel'] = new \App\Models\DosbingModel();
        // Find the user with the given $id
        $tb_sempro = $this->tb_sempro->getAll(); // Assuming you have a getAll method in your model

        // Check if the sempro with the given $id exists
        if ($tb_sempro) {
            // If the sempro exists, filter the sempro data based on $id
            $sempro = array_filter($tb_sempro, function ($sempro) use ($id) {
                return $sempro->id_sempro == $id;
            });

            // Check if the sempro with the given $id was found
            if (!empty($sempro)) {
                // Prepare data for the view
                $data['tb_sempro'] = reset($sempro); // Get the first element of the filtered array
                $data['tb_dafsempro'] = $this->tb_dafsempro->findAll();
                $data['tb_mahasiswa'] = $this->tb_mahasiswa->findAll();
                $data['tb_user'] = $this->tb_user->getAll();
                $data['tb_dosen'] = $this->tb_dosen->findAll();
                $data['tb_ruangan'] = $this->tb_ruangan->findAll();

                // Load the 'sempro/edit' view with the prepared data
                return view('sempro/edit', $data);
            } else {
                // If the user with the given $id was not found, throw a PageNotFoundException
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            // If there are no users, you may want to handle this situation accordingly
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     * @throws \ReflectionException
     */
    public function update($id = null)
    {
        $modelSempro = new SemproModel();
        $data = $modelSempro->where('id_sempro', $id)
            ->get()
            ->getResult();

        $sempro = $data[0];

        $data = $this->request->getPost();
        $this->tb_sempro->update($id, $data);

        error_log('Contents of $sempro: ' . print_r($sempro, true));


        if ($sempro->penguji1_sempro !== null) {
            $this->insertDetSempro($id, $sempro->id_dafsempro, $sempro->penguji1_sempro, "Ketua Penguji", $sempro->tanggal_sempro);
        }

        error_log('Contents of $sempro after first insertion attempt: ' . print_r($sempro, true));

        if ($sempro->penguji2_sempro !== null) {
            $this->insertDetSempro($id, $sempro->id_dafsempro, $sempro->penguji2_sempro, "Anggota Penguji 1", $sempro->tanggal_sempro);
        }

        // Check if $sempro->penguji3_sempro is not null before calling insertDetSempro
        if ($sempro->penguji3_sempro !== null) {
            $this->insertDetSempro($id, $sempro->id_dafsempro, $sempro->penguji3_sempro, "Anggota Penguji 2", $sempro->tanggal_sempro);
        }

        return redirect()->to(site_url('sempro'))->with('success', 'Data Berhasil Diupdate');
    }

//    private function isUnique($data)
//    {
//        if (!isset($data['id_sempro'])) {
//            return false; // Return false if 'id_sempro' is not set
//        }
//
//        // Extract relevant fields for uniqueness check
//        $id_ruangan = $data['id_ruangan'];
//        $jam_sempro = $data['jam_sempro'];
//        $tanggal_sempro = $data['tanggal_sempro'];
//
//        // Query to check if the combination is unique
//        $existingRecord = $this->tb_sempro
//            ->where('id_ruangan', $id_ruangan)
//            ->where('jam_sempro', $jam_sempro)
//            ->where('tanggal_sempro', $tanggal_sempro)
//            ->where('id_sempro !=', $data['id_sempro']) // Exclude the current record being updated
//            ->first();
//
//        // Return true if the combination is unique, false otherwise
//        return $existingRecord === null;
//    }

    /**
     * Insert data into tb_detsempro
     *
     * @param int $idSempro
     * @param int $idDafsempro
     * @param int $idDosen
     * @param string $levelDosen
     * @param string $tanggalDetsempro
     * @throws \ReflectionException
     */

    private function insertDetSempro(int $idSempro, int $idDafsempro, int $idDosen, string $levelDosen, string $tanggalDetsempro)
    {
        $existingRecord = $this->tb_detsempro
            ->where('id_sempro', $idSempro)
            ->where('id_dafsempro', $idDafsempro)
            ->where('id_dosen', $idDosen)
            ->first();

        // If no record found, insert the new data
        if (!$existingRecord) {
            $detSemproData = [
                'id_sempro' => $idSempro,
                'id_dafsempro' => $idDafsempro,
                'id_dosen' => $idDosen,
                'leveldosen_detsempro' => $levelDosen,
                'tanggal_detsempro' => $tanggalDetsempro,
            ];

            // Insert the data into tb_detsempro
            $this->tb_detsempro->insert($detSemproData);
        } else {
            // Handle the case where a record with the same combination already exists
            // You can throw an exception, log a message, or handle it according to your application's requirements
            // Example: throw new \Exception('Record with the same combination already exists.');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->tb_sempro->delete($id);
        return redirect()->to(site_url('sempro'))->with('success', 'Data Berhasil Dihapus');
    }
}
