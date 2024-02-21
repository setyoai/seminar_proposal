<?php

namespace App\Models;

use CodeIgniter\Model;

class DafSkripsiModel extends Model
{
    protected $table            = 'tb_dafskripsi';
    protected $primaryKey       = 'id_dafskripsi';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_dafskripsi', 'nim_dafskripsi', 'krs_dafskripsi', 'transkrip_dafskripsi',
        'slippembayaran_dafskripsi', 'status_dafskripsi', 'keterangan_dafskripsi'];

    public function getAll()
    {
        $builder = $this->db->table('tb_dafskripsi');
        $builder->select('tb_dafskripsi.*, tb_mahasiswa.nama_mhs AS nama_dafskripsi');
        $builder->join('tb_mahasiswa', 'tb_mahasiswa.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');

        $query = $builder->get();
        return $query->getResult();
    }
}
