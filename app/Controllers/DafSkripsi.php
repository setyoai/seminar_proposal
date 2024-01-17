<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class DafSkripsi extends ResourceController
{
    protected $modelName = 'App\Models\DafSkripsiModel';
    protected $helpers = ['custom'];
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_dafskripsi'] = $this->model->getAll();
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
        $tb_dafskripsi = $this->model->where('id_dafskripsi', $id)->first();

        if (is_object($tb_dafskripsi)) {
            $data['tb_dafskripsi'] = $tb_dafskripsi;

            // Add file names to the data array
            $data['krsFileName'] = $tb_dafskripsi->krs_dafskripsi;
            $data['transkripFileName'] = $tb_dafskripsi->transkrip_dafskripsi;
            $data['slipFileName'] = $tb_dafskripsi->slippembayaran_dafskripsi;


            return view('dafskripsi/edit', $data);
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
