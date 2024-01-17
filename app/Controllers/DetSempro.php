<?php

namespace App\Controllers;

use App\Models\DetSemproModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\RuanganModel;
use App\Models\SemproModel;
use CodeIgniter\RESTful\ResourceController;

class DetSempro extends ResourceController
{
    function __construct()
    {
        $this->tb_mhs = new MahasiswaModel();
        $this->tb_dosen= new DosenModel();
        $this->tb_ruangan = new RuanganModel() ;
        $this->tb_sempro = new SemproModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
//        $data['tb_detsempro'] = $this->model->findAll();
        $data['tb_sempro'] = $this->tb_sempro->getAll();
        return view('detsempro/index' ,$data);
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
