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
}
