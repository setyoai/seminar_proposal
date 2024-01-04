<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'tb_mhs';
    protected $primaryKey       = 'id_mhs';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nim_mhs', 'nama_mhs', 'password_mhs', 'email_mhs', 'alamat_mhs', 'nohp_mhs'];

    public function getMahasiswa($id)
    {
        $query = $this->select('id_mhs, nim_mhs, nama_mhs, email_mhs, alamat_mhs, nohp_mhs')
            ->where('id_mhs', $id)
            ->get();

        return $query->getRow();
    }

}
