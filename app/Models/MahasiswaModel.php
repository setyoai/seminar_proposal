<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'tb_mhs';
    protected $primaryKey       = 'id_mhs';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nim_mhs', 'nama_mhs', 'email_mhs', 'alamat_mhs', 'nohp_mhs'];


}
