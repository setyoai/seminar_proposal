<?php

namespace App\Models;

use CodeIgniter\Model;

class DosbingModel extends Model
{
    protected $table            = 'tb_dosbing';
    protected $primaryKey       = 'id_dosbing';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_dosbing','dafskripsiid_dosbing', 'dosen1_dosbing', 'dosen2_dosbing', 'tanggal_dosbing'];

    public function getAll()
    {
        $builder = $this->db->table('tb_dosbing');
        $builder->select('tb_dosbing.*, tb_dafskripsi.nim_dafskripsi, m.nama_mhs AS nama_mhs, 
                d1.nama_dosen AS nama_dosen1, d2.nama_dosen AS nama_dosen2,');

        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dosbing.dafskripsiid_dosbing ', 'left');
        $builder->join('tb_mhs m',    'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');
        $builder->join('tb_dosen d1', 'd1.id_dosen = tb_dosbing.dosen1_dosbing', 'left');
        $builder->join('tb_dosen d2', 'd2.id_dosen = tb_dosbing.dosen2_dosbing', 'left');

        $query = $builder->get();
        return $query->getResult();
    }
}
