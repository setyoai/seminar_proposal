<?php

namespace App\Controllers;

use App\Models\DafSemproModel;
use App\Models\SemproModel;
use CodeIgniter\RESTful\ResourceController;

class DafSemproRest extends ResourceController
{
    protected $helpers = ['custom'];
    protected $modelName = 'App\Models\DafsemproModel';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'error' => false,
            'data_dafsempro' => $this->model->getAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $modelDafSem = new DafSemproModel();

        // Querying the MahasiswaModel for a specific ID
        $data = $modelDafSem->where('id_dafskripsi', $id)
            ->get()
            ->getResult();

        if (!empty($data)) {
            // If the data for the specified ID is found
            $dafsempro = $data[0]; // Use the first (and only) result

            $dafsempro_data = [
                'id_dafsempro' => $dafsempro->id_dafsempro,
                'transkrip_dafsempro' => $dafsempro->transkrip_dafsempro,
                'slippembayaran_dafsempro' => $dafsempro->slippembayaran_dafsempro,
                'status_dafsempro' => $dafsempro->status_dafsempro,
                'keterangan_dafsempro' => $dafsempro->keterangan_dafsempro,
            ];
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'dafsempro_data' => $dafsempro_data,
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
            $modelDafSem = new DafSemproModel();
            $modelSempro = new SemproModel();
            $uploadedFiles = [];

            // List of allowed file fields
            $allowedFields = [
                'id_dafsempro',
                'id_dafskripsi',
                'judul_dafsempro',
                'transkrip_dafsempro',
                'pengesahan_dafsempro',
                'bukubimbingan_dafsempro',
                'kwkomputer_dafsempro',
                'kwinggris_dafsempro',
                'kwkwu_dafsempro',
                'slippembayaran_dafsempro',
                'plagiasi_dafsempro',
                'tanggal_dafsempro',
                'status_dafsempro',
                'keterangan_dafsempro',
            ];

            foreach ($allowedFields as $fieldName) {
                // Validate and move each file if present in the request
                if ($this->request->getFile($fieldName)) {
                    $uploadedFiles[$fieldName] = $this->validateAndMoveFile($fieldName)->getName();
                }
            }

            $idDafskripsi = $this->request->getPost('id_dafskripsi');
            if ($modelDafSem->where('id_dafskripsi', $idDafskripsi)->first() !== null) {
                // If id_dafskripsi already exists, throw an exception
                throw new \Exception("id_dafskripsi '$idDafskripsi' already exists");
            }

            // Save file names to the database
            $data = array_merge(['id_dafskripsi' => $this->request->getPost('id_dafskripsi')], $uploadedFiles,
                ['judul_dafsempro' => $this->request->getPost('judul_dafsempro')]);
            $modelDafSem->insert($data);

            $dataSempro = [
                'id_dafsempro' => $modelDafSem->getInsertID(),
            ];

            // Save data to the second table (DosbingModel)
            $modelSempro->insert($dataSempro);

            $response = [
                'error' => false,
                'message' => 'success',
                'upload_result' => $uploadedFiles
            ];

            // Return a success response
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
        $tb_dafsempro = $this->tb_dafsempro->where('id_dafsempro', $id)->first();

        if (is_object($tb_dafsempro)) {
            $data['tb_dafsempro'] = $tb_dafsempro;

            // Add file names to the data array
            $data['transkripFileName'] = $tb_dafsempro->transkrip_dafsempro;
            $data['pengesahanFileName'] = $tb_dafsempro->pengesahan_dafsempro;
            $data['bukubimbinganFileName'] = $tb_dafsempro->bukubimbingan_dafsempro;
            $data['kwkomputerFileName'] = $tb_dafsempro->kwkomputer_dafsempro;
            $data['kwinggrisFileName'] = $tb_dafsempro->kwinggris_dafsempro;
            $data['kwKwuFileName'] = $tb_dafsempro->kwkwu_dafsempro;
            $data['slipFileName'] = $tb_dafsempro->slippembayaran_dafsempro;
            $data['plagiasiFileName'] = $tb_dafsempro->plagiasi_dafsempro;

            return view('dafsempro/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $transkripFile = $this->request->getFile('transkrip_dafsempro');
        $pengesahanFile = $this->request->getFile('pengesahan_dafsempro');
        $bimbinganFile = $this->request->getFile('bukubimbingan_dafsempro');
        $kwkomputerFile = $this->request->getFile('kwkomputer_dafsempro');
        $statusDafsempro = $this->request->getPost('status_dafsempro');
        $ketSempro = $this->request->getPost('ket_sempro');

        // ... (same code as before)

        // Prepare data for update
        $data = [
            'status_dafsempro' => $statusDafsempro,
            'ket_sempro' => $ketSempro,
        ];

        // Include file names in the update only if new files are uploaded
        if ($transkripFile && $transkripFile->isValid()) {
            $data['transkrip_dafsempro'] = $transkripFile->getName();
        }
        if ($pengesahanFile && $pengesahanFile->isValid()) {
            $data['pengesahan_dafsempro'] = $pengesahanFile->getName();
        }
        if ($bimbinganFile && $bimbinganFile->isValid()) {
            $data['bukubimbingan_dafsempro'] = $bimbinganFile->getName();
        }
        if ($kwkomputerFile && $kwkomputerFile->isValid()) {
            $data['kwkomputer_dafsempro'] = $kwkomputerFile->getName();
        }

        // Check if there is data to update
        if (empty($data)) {
            // Handle this situation as needed
            // You might want to redirect back with an error message
            return redirect()->back()->with('error', 'No data to update');
        }

        // Update the database
        $this->model->update($id, $data);

        return redirect()->to(site_url('dafsempro'))->with('success', 'Data Berhasil Diupdate');
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
