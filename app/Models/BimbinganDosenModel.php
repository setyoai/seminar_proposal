<?php

namespace App\Models;

use CodeIgniter\Model;

class BimbinganDosenModel extends Model
{
    protected $table            = 'tb_bimbingan';
    protected $primaryKey       = 'id_bimbingan';

    protected $returnType       = 'object';
    protected $allowedFields    = [
        'dosbingid_bimbingan',
        'mhsnim_bimbingan',
        'bab_bimbingan',
        'ket_bimbingan',
        'file_bimbingan',
        'tanggal_bimbingan',
        'dosenid_bimbingan',
        'balasanfile_bimbingan',
        'balasanket_bimbingan',
        'balasantanggal_bimbingan',
        'status_bimbingan'
    ];

    public function getAll($id_bimbingan = null)
    {
        $builder = $this->db->table('tb_bimbingan');
        $builder->select('tb_bimbingan.*, m.nama_mhs AS nama_mhs');

        $builder->join('tb_dosbing', 'tb_dosbing.id_dosbing = tb_bimbingan.dosbingid_bimbingan', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dosbing.dafskripsiid_dosbing ', 'left');
        $builder->join('tb_mahasiswa m',    'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');

        if ($id_bimbingan!== null) {
            $builder->where('id_bimbingan', $id_bimbingan);
        }

        $query = $builder->get();
        return $query->getResult();
    }

}
