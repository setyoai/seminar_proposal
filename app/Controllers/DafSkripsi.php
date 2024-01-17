<?php

namespace App\Controllers;

use App\Models\DafSkripsiModel;
use CodeIgniter\RESTful\ResourceController;

class DafSkripsi extends ResourceController
{
    protected $helpers = ['custom'];
    function __construct()
    {
        $this->tb_dafskripsi = new DafSkripsiModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_dafskripsi'] = $this->tb_dafskripsi->getAll();
        return view('dafskripsi/index' ,$data);
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
        $tb_dafskripsi = $this->tb_dafskripsi->where('id_dafskripsi', $id)->first();
        if (is_object($tb_dafskripsi)) {
            $data['tb_dafskripsi'] = $tb_dafskripsi;
            return view('dafskripsi/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException:: forPageNotFound();
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
        $this->tb_dafskripsi->update($id, $data);
        return redirect()->to(site_url('dafskripsi'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->tb_dafskripsi->delete($id);
        return redirect()->to(site_url('dafskripsi'))->with('success', 'Data Berhasil Dihapus');
    }
}
