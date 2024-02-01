<?php

namespace App\Models;

use CodeIgniter\Model;

class DafSemproModel extends Model
{
    protected $table            = 'tb_dafsempro';
    protected $primaryKey       = 'id_dafsempro';

    protected $returnType       = 'object';

    protected $allowedFields    = [
        'id_dafsempro',
        'id_dafskripsi',
        'judul_dafsempro',
        'transkrip_dafsempro',
        'pengesahan_dafsempro',
        'bukubimbingan_dafsempro',
        'kwkomputer_dafsempro',
        'kwinggris_dafsempro',
        'kwkwu_dafsempro',
        'slippembayaran_dafsempro',
        'plagiasi_dafsempro',
        'tanggal_dafsempro',
        'status_dafsempro',
        'keterangan_dafsempro'
    ];

    public function getAll()
    {
        $builder = $this->db->table('tb_dafsempro');
        $builder->select('tb_dafsempro.*, tb_dafskripsi.nim_dafskripsi AS nim_dafsempro, m.nama_mhs AS nama_dafsempro,');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dafsempro.id_dafskripsi', 'left');
        $builder->join('tb_mhs m',    'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');

        $query = $builder->get();
        return $query->getResult();
    }

}
