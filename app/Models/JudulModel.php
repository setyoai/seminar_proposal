<?php

namespace App\Models;

use CodeIgniter\Model;

class JudulModel extends Model
{
    protected $table            = 'tb_judulskripsi';
    protected $primaryKey       = 'id_judul';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_judul', 'nim_mhs', 'nama_mhs','judul_skripsi',
                                    'dosen1_dosbing', 'dosen2_dosbing','tahun_skripsi'];


    public function getDosenNameById($id_dosen)
    {
        $builder = $this->db->table('tb_dosen');
        $builder->select('nama_dosen');
        $builder->where('id_dosen', $id_dosen);
        $query = $builder->get();
        $result = $query->getRow();

        return ($result) ? $result->nama_dosen : null;
    }

}
