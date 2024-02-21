<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

class Ruangan extends ResourcePresenter
{
    protected $modelName = 'App\Models\RuanganModel';
    protected $helpers = ['custom'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        //        $data['tb_mahasiswa'] = $this->mahasiswa->findAll();
        $data['tb_ruangan'] = $this->model->findAll();
        return view('ruangan/index' ,$data);
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
        return view('ruangan/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
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
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $tb_ruangan = $this->model->where('id_ruangan', $id)->first();
        if (is_object($tb_ruangan)) {
            $data['tb_ruangan'] = $tb_ruangan;
            return view('ruangan/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException:: forPageNotFound();
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
        $data = $this->request->getPost();
        $this->model->update($id, $data);
        return redirect()->to(site_url('ruangan'))->with('success', 'Data Berhasil Diupdate');
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
        //        $this->model->where('id_ruangan', $id)->delete();
        $this->model->delete($id);
        return redirect()->to(site_url('ruangan'))->with('success', 'Data Berhasil Dihapus');
    }
}
