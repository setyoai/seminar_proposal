<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\DosenModel;

class Dosen extends ResourcePresenter
{
    protected $helpers = ['custom'];

    function __construct()
    {
        $this->tb_dosen = new DosenModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_dosen'] = $this->tb_dosen->findAll();
        return view('dosen/index' ,$data);
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
        return view('dosen/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $validate = $this->validate([
            'nidn_dosen' => [
                'rules' => 'is_unique[tb_dosen.nidn_dosen]',
                'label' => 'Nomor Induk Dosen Nasional',
                'errors' => [
                    'is_unique' => "{field} sudah ada"
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $this->tb_dosen->insert($data);
        return redirect()->to(site_url('dosen'))->with('success', 'Data Berhasil Disimpan');
//        if (!$save) {
//            return redirect()->back()->withINput()->with('errors', $this->tb_dosen->errors());
//        } else {
//            return redirect()->to(site_url('dosen'))->with('success', 'Data Berhasil Disimpan');
//        }
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
            return view('dosen/edit', $data);
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
        return redirect()->to(site_url('dosen'))->with('success', 'Data Berhasil Diupdate');
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
        $this->tb_dosen->delete($id);
        return redirect()->to(site_url('dosen'))->with('success', 'Data Berhasil Dihapus');
    }
}
