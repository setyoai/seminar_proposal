<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SemproModel;
use App\Models\MahasiswaModel;
use App\Models\RuanganModel;

class Sempro extends ResourceController
{
    protected $helpers = ['custom'];

    function __construct()
    {
        $this->tb_mhs = new MahasiswaModel();
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
        //        $data['tb_mhs'] = $this->mahasiswa->findAll();
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
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['tb_mhs'] = $this->tb_mhs->findAll();
        $data['tb_ruangan'] = $this->tb_ruangan->findAll();
        return view('sempro/new' ,$data);
    }

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
        $tb_sempro = $this->tb_sempro->find($id);
        if (is_object($tb_sempro)) {
            $data['tb_sempro'] = $tb_sempro;
            $data['tb_mhs'] = $this->tb_mhs->findAll();
            $data['tb_ruangan'] = $this->tb_ruangan->findAll();
            return view('sempro/edit', $data);
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
