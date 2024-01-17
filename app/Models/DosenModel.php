<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table            = 'tb_dosen';
    protected $primaryKey       = 'id_dosen';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_dosen', 'nidn_dosen', 'nama_dosen', 'alamat_dosen', 'nohp_dosen', 'email_dosen'];


//    protected $validationRules = [
//        'nidn_dosen'  => 'required|is_unique[tb_dosen.nidn_dosen]',
//    ];
//    protected $validationMessages = [
//        'nidn_dosen' => [
//            'is_unique' => 'Mohon maaf nomer nidn sudah digunakan',
//        ],
//    ];
}
