<?php

namespace App\Controllers;

use App\Models\DafSkripsiModel;
use App\Models\DosbingModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Dosbing extends ResourceController
{
    protected $helpers = ['custom'];
    function __construct()
    {
        $this->tb_dosbing = new DosbingModel();
        $this->tb_dafskripsi = new DafSkripsiModel();
        $this->tb_mhs = new MahasiswaModel();
        $this->tb_dosen = new DosenModel();
        $this->tb_user = new UserModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_dosbing'] = $this->tb_dosbing->getAll();
        return view('dosbing/index' ,$data);
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
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $tb_dosbing = $this->tb_dosbing->getAll();

        if ($tb_dosbing) {
            $dosbing = array_filter($tb_dosbing, function ($dosbing) use ($id) {
                return $dosbing->id_dosbing == $id;
            });

            if (!empty($dosbing)) {
                // Prepare data for the view
                $data['tb_dosbing'] = reset($dosbing); // Get the first element of the filtered array
                $data['tb_dafskripsi'] = $this->tb_dafskripsi->findAll();
                $data['tb_user'] = $this->tb_user->getAll();
                $data['tb_mahasiswa'] = $this->tb_mhs->findAll();
                $data['tb_dosen'] = $this->tb_dosen->findAll();

                return view('dosbing/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
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
        $data = $this->request->getPost();
        $this->tb_dosbing->update($id, $data);
        return redirect()->to(site_url('dosbing'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->tb_dosbing->delete($id);
        return redirect()->to(site_url('dosbing'))->with('success', 'Data Berhasil Dihapus');
    }
}
