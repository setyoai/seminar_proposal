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
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // Find the user with the given $id
        $tb_user = $this->tb_user->getAll(); // Assuming you have a getAll method in your model

        // Check if the user with the given $id exists
        if ($tb_user) {
            // If the user exists, filter the user data based on $id
            $user = array_filter($tb_user, function ($user) use ($id) {
                return $user->id_user == $id;
            });

            // Check if the user with the given $id was found
            if (!empty($user)) {
                // Prepare data for the view
                $data['tb_user'] = reset($user); // Get the first element of the filtered array
                $data['tb_dosen'] = $this->tb_dosen->findAll(); // Retrieve all records from tb_dosen
                $data['tb_auth'] = $this->tb_auth->findAll();   // Retrieve all records from tb_auth

                // Load the 'user/edit' view with the prepared data
                return view('user/edit', $data);
            } else {
                // If the user with the given $id was not found, throw a PageNotFoundException
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            // If there are no users, you may want to handle this situation accordingly
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
