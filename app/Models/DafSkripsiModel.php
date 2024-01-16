<?php

namespace App\Models;

use CodeIgniter\Model;

class DafSkripsiModel extends Model
{
    protected $table            = 'tb_dafskripsi';
    protected $primaryKey       = 'id_dafskripsi';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_dafskripsi', 'nim_dafskripsi', 'krs_dafskripsi', 'transkrip_dafskripsi',
                                  'slip_dafskripsi', 'status_dafskripsi', 'keterangan_dafskripsi', 'status_akhir'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    // Callbacks

}
