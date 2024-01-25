<?php

namespace App\Models;

use CodeIgniter\Model;

class JudulModel extends Model
{
    protected $table            = 'tb_judulskripsi';
    protected $primaryKey       = 'id_judul';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_judul', 'nim_mhs', 'nama_mhs', 'judulskripsi', 'tahun_skripsi'];

}
