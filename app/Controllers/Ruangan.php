<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Ruangan extends ResourceController
{
    protected $modelName = 'App\Models\RuanganModel';
    protected $helpers = ['custom'];
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_ruangan'] = $this->model->findAll();
        return view('ruangan/index' ,$data);
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
        return view('ruangan/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->model->insert($data);
        return redirect()->to(site_url('ruangan'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
//        $tb_ruangan = $this->model->where('id_ruangan', $id)->first();
//        if (is_object($tb_ruangan)) {
//            $data['tb_ruangan'] = $tb_ruangan;
//            return view('ruangan/edit', $data);
//        } else {
//            throw \CodeIgniter\Exceptions\PageNotFoundException:: forPageNotFound();
//        }
        return view('ruangan/edit');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->model->update($id, $data);
        return redirect()->to(site_url('ruangan'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //        $this->model->where('id_mhs', $id)->delete();
        $this->model->delete($id);
        return redirect()->to(site_url('ruangan'))->with('success', 'Data Berhasil Dihapus');
    }
}
