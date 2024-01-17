<?php

namespace App\Controllers;

use App\Models\DosenUserModel;
use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\DosenModel;

class Dosen extends ResourcePresenter
{
    protected $helpers = ['custom'];

    function __construct()
    {
        $this->tb_user = new DosenUserModel();
        $this->tb_dosen = new DosenModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['tb_user'] = $this->tb_user->getAll();
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
        $data = $this->request->getPost();

        // Sesuaikan dengan struktur tabel tb_dosen
        $dataDosen = [
            'nidn_dosen'   => $data['nidn_dosen'],
            'nama_dosen'   => $data['nama_dosen'],
            'alamat_dosen' => $data['alamat_dosen'],
            'nohp_dosen'   => $data['nohp_dosen'],
            'email_dosen'  => $data['email_dosen'],
        ];

        // Menyisipkan data ke dalam tb_dosen
        $this->tb_dosen->insert($dataDosen);

        // Mengambil id_dosen dari data yang baru disisipkan

        // Menggunakan id_dosen sebagai nilai nidn_dosen di tb_user
        $dataUser = [
            'username_user'  => $data['nidn_dosen'], // Menggunakan nidn_dosen sebagai username
            'password_user'  => password_hash($data['password_user'], PASSWORD_BCRYPT),
            'level_userid'  => $data['level_userid'],
        ];

        // Menyisipkan data ke dalam tb_user
        $this->tb_user->insert($dataUser);

        return redirect()->to(site_url('dosen'))->with('success', 'Data Berhasil Disimpan');
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
