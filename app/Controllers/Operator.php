<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\OperatorModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Operator extends ResourcePresenter
{
    protected $helpers = ['custom'];

    function __construct()
    {
        $this->tb_dosen = new OperatorModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_dosen'] = $this->tb_dosen->findAll();
        return view('operator/index' ,$data);
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
        return view('operator/new');
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
        $this->tb_dosen->insert($data);
        return redirect()->to(site_url('operator'))->with('success', 'Data Berhasil Disimpan');
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
        $tb_dosen = $this->tb_dosen->where('id_dosen', $id)->first();
        if (is_object($tb_dosen)) {
            $data['tb_dosen'] = $tb_dosen;
            return view('operator/edit', $data);
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
        $this->tb_dosen->update($id, $data);
        return redirect()->to(site_url('operator'))->with('success', 'Data Berhasil Diupdate');
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
