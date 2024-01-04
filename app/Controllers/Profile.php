<?php

namespace App\Controllers;

use App\Models\DosenModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Profile extends ResourcePresenter
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
    public function index($id = null)
    {
        $data['tb_dosen'] = $this->tb_dosen->find($id);

        if (empty($data['tb_dosen'])) {
            // Handle the case where the record with the specified ID is not found
            // You might redirect or display an error message
            return redirect()->to('profile')->with('error', 'Profile not found');
        }

        return view('profile/edit', $data);
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
        //
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
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
        //
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
