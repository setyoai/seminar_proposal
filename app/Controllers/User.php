<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\UserModel;
use App\Models\AuthModel;
use CodeIgniter\RESTful\ResourcePresenter;

class User extends ResourcePresenter
{
    protected $helpers = ['custom'];

    function __construct()
    {
        $this->tb_dosen = new DosenModel();
        $this->tb_auth = new AuthModel() ;
        $this->tb_user = new UserModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_user'] = $this->tb_user->getAll();
        return view('user/index' ,$data);

//        return view('user/index');
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
        $data['tb_dosen'] = $this->tb_dosen->findAll();
        $data['tb_auth'] = $this->tb_auth->findAll();
        return view('user/new' ,$data);
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
        $password = password_hash($data['password_user'], PASSWORD_BCRYPT);
        $data['password_user'] = $password;
        $this->tb_user->insert($data);
        return redirect()->to(site_url('user'))->with('success', 'Data Berhasil Disimpan');
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

        $tb_user = $this->tb_user->find($id);

        if (is_object($tb_user)) {
            $data['tb_user'] = $tb_user;
            $data['tb_dosen'] = $this->tb_dosen->findAll();
            $data['tb_auth'] = $this->tb_auth->findAll();
            return view('user/edit', $data);
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

        // Check if new password and confirm password match
        if ($data['newpassword'] != $data['conpassword']) {
            return redirect()->to(site_url('user/edit/' . $id))->with('error', 'Kata sandi baru dan kata sandi konfirmasi tidak cocok');
        }

        // Hash the new password
        $password = password_hash($data['newpassword'], PASSWORD_BCRYPT);
        $data['password_user'] = $password;

        // Remove unnecessary fields from $data
        unset($data['newpassword']);
        unset($data['conpassword']);

        // Update the user record in the database
        $this->tb_user->update($id, $data);

        return redirect()->to(site_url('user'))->with('success', 'Data Berhasil Diupdate');
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
        $this->tb_user->delete($id);
        return redirect()->to(site_url('user'))->with('success', 'Data Berhasil Dihapus');
    }
}
