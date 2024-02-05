<?php

namespace App\Models;

use CodeIgniter\Model;

class BimbinganModel extends Model
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
}
