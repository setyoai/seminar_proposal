<?php

namespace App\Controllers;

use App\Models\DafSemproModel;
use App\Models\DafSkripsiModel;
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
        $this->tb_dafskripsi = new DafSkripsiModel();
        $this->tb_mhs = new MahasiswaModel();
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
                $data['tb_mhs'] = $this->tb_mhs->findAll();
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
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->tb_sempro->update($id, $data);
        return redirect()->to(site_url('sempro'))->with('success', 'Data Berhasil Diupdate');
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
