<?php

namespace App\Controllers;

class MainMenu extends BaseController
{
    public function index()
    {
        // cara 1 : query builder
        $builder = $this->db->table('tb_dosen');
        $query   = $builder->get();

        //cara 2 : query manual
        $query = $this->db->query("SELECT * FROM tb_dosen");


        $data['tb_dosen'] = $query->getResult();
        return view('main_menu/get' , $data);
    }

    public function create() {
        return view('main_menu/add');
    }

    public function store() {

        // method 1 : same name
        $data = $this->request->getPost();

        $this->db->table('tb_dosen')->insert($data);

        if($this->db->affectedRows() > 0 ) {
            return redirect()->to(site_url('main_menu'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit ($id = null) {
        if($id != null) {
            $query = $this->db->table('tb_dosen')->getwhere(['id_dosen' => $id]);
            if($query->resultID->num_rows > 0) {
                $data['tb_dosen'] = $query->getRow();
                return view('main_menu/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException:: forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException:: forPageNotFound();
        }
    }

    public function update($id) {
        // cara 1 : name sama
        $data = $this->request->getPost();
        unset($data['_method']);

        //cara 2 : name spesifik
//        $data = [
//            'name_dosen' => $this->request->getVar('name_gawe'),
//            'date_gawe' => $this->request->getVar('date_gawe'),
//            "info_gawe" => $this->request->getVar('info_gawe'),
//        ];
        $this->db->table('tb_dosen')->where(['id_dosen' => $id])->update($data);
        return redirect()->to(site_url('main_menu'))->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id) {
        $this->db->table('tb_dosen')->where(['id_dosen' => $id])->delete();
        return redirect()->to(site_url('main_menu'))->with('success', 'Data Berhasil Dihapus');
    }
}
