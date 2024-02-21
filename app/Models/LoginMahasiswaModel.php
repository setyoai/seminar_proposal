<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginMahasiswaModel extends Model
{
    protected $table            = 'tb_mahasiswa';
    protected $primaryKey       = 'id_mhs';
//    protected $returnType       = 'array';
//
//    protected $allowedFields    = [];


    public function cekLogin($nim_mhs)
    {
        $query = $this->table($this->table)->getWhere(['nim_mhs' => $nim_mhs]);
        return $query;
    }


}
