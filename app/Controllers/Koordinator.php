<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\KoordinatorModel;
use CodeIgniter\RESTful\ResourceController;

class Koordinator extends ResourceController
{
    function __construct()
    {
        $this->tb_user = new KoordinatorModel();
        $this->tb_dosen = new DosenModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_user'] = $this->tb_user->getAll();
        return view('koordinator/index' ,$data);
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
        $tb_dosen = $this->tb_dosen->where('id_dosen', $id)->first();
        if (is_object($tb_dosen)) {
            $data['tb_dosen'] = $tb_dosen;
            return view('koordinator/edit', $data);
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
        $this->tb_dosen->update($id, $data);
        return redirect()->to(site_url('koordinator'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->tb_dosen->delete($id);
        return redirect()->to(site_url('koodinator'))->with('success', 'Data Berhasil Dihapus');
    }
}
