<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'tb_mhs';
    protected $primaryKey       = 'id_mhs';
    protected $returnType       = 'array';
    protected $allowedFields    = ['nim_mhs', 'nama_mhs', 'password_mhs', 'email_mhs', 'alamat_mhs', 'nohp_mhs', 'photo_mhs'];

    public function cekLogin($nim_mhs)
    {
        $query = $this->table($this->table)->getWhere(['nim_mhs' => $nim_mhs]);
        return $query;
    }
}
