<?php

namespace App\Models;

use CodeIgniter\Model;

class JudulModel extends Model
{
    protected $table            = 'tb_judulskripsi';
    protected $primaryKey       = 'id_judulskripsi';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_judulskripsi', 'judulskripsi', 'tahun_skripsi'];

}
