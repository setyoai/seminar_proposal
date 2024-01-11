<?php

namespace App\Controllers;

use App\Models\DafSemproModel;
use CodeIgniter\RESTful\ResourceController;

class DafSemproRest extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $modelDafSem = new DafSemproModel();
        $data = $modelDafSem->findAll();
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
        $modelDafSem = new DafSemproModel();
        $transkripFile = $this->request->getFile('transkrip_dafsempro');
        $pengesahanFile = $this->request->getFile('pengesahan_dafsempro');
        $bimbinganFile = $this->request->getFile('bukubimbingan_dafsempro');
        $kwkomputerFile = $this->request->getFile('kwkomputer_dafsempro');
        $kwInggrisFile = $this->request->getFile('kwInggris_dafsempro');
//        $kwKewirausahaanFile = $this->request->getFile('kwKewirausahaan_dafsempro');
//        $slipPembayaranFile = $this->request->getFile('slipPembayaran_dafsempro');
//        $plagiasiFile = $this->request->getFile('plagiasi_dafsempro');

        // Move files to the 'upload' directory
        $transkripFile->move('upload');
        $pengesahanFile->move('upload');
        $bimbinganFile->move('upload');
        $kwkomputerFile->move('upload');
        $kwInggrisFile->move('upload');

        // Save file names to the database or perform other actions as needed
        $data = [
//            'status_dafsempro' => $statusDafsempro,
            'transkrip_dafsempro' => $transkripFile->getName(),
            'pengesahan_dafsempro' => $pengesahanFile->getName(),
            'bukubimbingan_dafsempro' => $bimbinganFile->getName(),
            'kwkomputer_dafsempro' => $kwkomputerFile->getName(),
            'kwInggris_dafsempro' => $kwInggrisFile->getName(),
        ];

        // Assuming you have a model named YourModel, replace it with your actual model name
        $modelDafSem->insert($data);
        $response = [
            'error' => false,
            'message' => 'success',
            'upload_result' => $data
        ];

        // Return a response as needed (e.g., success or error message)
        return $this->respondCreated($response, 200);
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
