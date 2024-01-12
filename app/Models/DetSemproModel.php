<?php

namespace App\Models;

use CodeIgniter\Model;

class DetSemproModel extends Model
{
    protected $table            = 'tb_detsempro';
    protected $primaryKey       = 'id_detsempro';
    protected $returnType       = 'object';

    protected $allowedFields    = [
        'id_detsempro',
        'id_dafsempro',
        'id_sempro',
        'id_dosen',
        'leveldosen_detsempro',
        'ketrev_detsempro',
        'tanggal_detsempro'
    ];

    public function getAll()
    {
        $builder = $this->db->table('tb_detsempro');
        $builder->select('tb_detsempro.*,tb_sempro.tanggal_sempro, tb_sempro.id_ruangan, tb_sempro');
        $builder->join('tb_sempro', 'tb_sempro.id_sempro = tb_detsempro.id_sempro', 'left');
        $builder->join('tb_dafsempro', 'tb_dafsempro.id_dafsempro = tb_detsempro.id_dafsempro', 'left');

        $query = $builder->get();
        return $query->getResult();
    }

}
