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
        'id_mhs',
        'nama_dafsempro',
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
        'ket_dafsempro',
        'judul',
    ];

    public function getAll()
    {
        $builder = $this->db->table('tb_dafsempro');
        $builder->select('tb_dafsempro.*, tb_mhs.nim_mhs AS nim_dafsempro, tb_mhs.nama_mhs AS nama_dafsempro', 'tb_mhs.id_mhs');
        $builder->join('tb_mhs', 'tb_mhs.id_mhs = tb_dafsempro.id_mhs', 'left');

        $query = $builder->get();
        return $query->getResult();
    }

}
