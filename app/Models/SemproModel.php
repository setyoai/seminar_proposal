<?php

namespace App\Models;

use CodeIgniter\Model;

class SemproModel extends Model
{
    protected $table            = 'tb_sempro';
    protected $primaryKey       = 'id_sempro';

    protected $returnType       = 'object';
    protected $allowedFields    = [
                'id_mhs' ,
                'id_ruangan',
                'jam_sempro',
                'tanggal_sempro',
                'penguji1_sempro',
                'penguji2_sempro' ,
                'penguji3_sempro' ,
                'status_sempro',
                'hasil_sempro'
    ];

    function getAll()
    {
        $builder = $this->db->table('tb_sempro');
        $builder->select('tb_sempro.*, tb_ruangan.nama_ruangan, tb_mhs.nim_mhs, tb_mhs.nama_mhs');
        $builder->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_sempro.id_ruangan', 'left');
        $builder->join('tb_mhs', 'tb_mhs.id_mhs = tb_sempro.id_mhs', 'left');
        $query = $builder->get();
        return $query->getResult();
    }


}
