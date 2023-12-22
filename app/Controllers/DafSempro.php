<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

class DafSempro extends ResourcePresenter
{
    protected $modelName = 'App\Models\DafSemproModel';
    protected $helpers = ['custom'];

    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_dafsempro'] = $this->model->findAll();
        return view('dafsempro/index' ,$data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('dafsempro/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $transkripFile = $this->request->getFile('transkrip_dafsempro');
        $pengesahanFile = $this->request->getFile('pengesahan_dafsempro');
        $bimbinganFile = $this->request->getFile('bukubimbingan_dafsempro');
        $kwkomputerFile = $this->request->getFile('kwkomputer_dafsempro');
        $statusDafsempro = $this->request->getPost('status_dafsempro');
        $ketSempro = $this->request->getPost('ket_sempro');

        // Move files to the 'upload' directory
        $transkripFile->move('upload');
        $pengesahanFile->move('upload');
        $bimbinganFile->move('upload');
        $kwkomputerFile->move('upload');

        // Save file names to the database or perform other actions as needed
        $data = [
            'status_dafsempro' => $statusDafsempro,
            'ket_sempro' => $ketSempro,
            'transkrip_dafsempro' => $transkripFile->getName(),
            'pengesahan_dafsempro' => $pengesahanFile->getName(),
            'bukubimbingan_dafsempro' => $bimbinganFile->getName(),
            'kwkomputer_dafsempro' => $kwkomputerFile->getName(),
        ];

        $this->model->insert($data);

        return redirect()->to(site_url('dafsempro'));
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $tb_dafsempro = $this->model->where('id_dafsempro', $id)->first();

        if (is_object($tb_dafsempro)) {
            $data['tb_dafsempro'] = $tb_dafsempro;

            // Add file names to the data array
            $data['transkripFileName'] = $tb_dafsempro->transkrip_dafsempro;
            $data['pengesahanFileName'] = $tb_dafsempro->pengesahan_dafsempro;
            $data['bukubimbinganFileName'] = $tb_dafsempro->bukubimbingan_dafsempro;
            $data['kwkomputerFileName'] = $tb_dafsempro->kwkomputer_dafsempro;

            return view('dafsempro/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
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
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
