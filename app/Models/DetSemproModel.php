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
        'tanggal_detsempro',
        'nama_detsempro'
    ];

    public function getAll($id_dosen = null)
    {
        $builder = $this->db->table('tb_detsempro');
        $builder->select(
            'tb_detsempro.*,
            tb_sempro.tanggal_sempro,
            tb_sempro.jam_sempro,
             tb_sempro.nama_ruanganid, 
            tb_sempro.hasil_sempro,
            tb_dafskripsi.nim_dafskripsi AS nim_detsempro, 
            m.nama_mhs AS nama_detsempro, 
            tb_ruangan.nama_ruangan'
        );
        $builder->join('tb_sempro', 'tb_sempro.id_sempro = tb_detsempro.id_sempro', 'left');
        $builder->join('tb_dafsempro', 'tb_dafsempro.id_dafsempro = tb_detsempro.id_dafsempro', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dafsempro.id_dafskripsi', 'left');
        $builder->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_sempro.nama_ruanganid', 'left');
        $builder->join('tb_mhs m', 'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');

        if ($id_dosen !== null) {
            $builder->where('tb_detsempro.id_dosen', $id_dosen);
        }

        $query = $builder->get();
        return $query->getResult();
    }
}
