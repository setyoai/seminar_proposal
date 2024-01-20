<?php

namespace App\Models;

use CodeIgniter\Model;

class SemproModel extends Model
{
    protected $table = 'tb_sempro';
    protected $primaryKey = 'id_sempro';

    protected $returnType = 'object';
    protected $allowedFields = [
        'id_sempro',
        'id_dafsempro',
        'id_ruangan',
        'jam_sempro',
        'tanggal_sempro',
        'penguji1_sempro',
        'penguji2_sempro',
        'penguji3_sempro',
        'status_sempro',
        'hasil_sempro'
    ];

    public function getAll()
    {
        $builder = $this->db->table('tb_sempro');
        $builder->select('tb_sempro.*, tb_ruangan.nama_ruangan, tb_dafskripsi.nim_dafskripsi AS nim_sempro,
        m.nama_mhs AS nama_sempro');

        $builder->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_sempro.id_ruangan', 'left');
        $builder->join('tb_dafsempro', 'tb_dafsempro.id_dafsempro = tb_sempro.id_dafsempro', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dafsempro.id_dafskripsi', 'left');
        $builder->join('tb_mhs m', 'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');
        $builder->join('tb_dosbing d', 'd.dafskripsiid_dosbing = tb_dafskripsi.id_dafskripsi', 'left');
//        $builder->join('tb_dosen d1', 'd1.id_dosen = tb_sempro.penguji1_sempro', 'left');
//        $builder->join('tb_dosen d2', 'd2.id_dosen = tb_sempro.penguji2_sempro', 'left');
//        $builder->join('tb_dosen d3', 'd3.id_dosen = tb_sempro.penguji3_sempro', 'left');

        $query = $builder->get();
        return $query->getResult();
    }

}
