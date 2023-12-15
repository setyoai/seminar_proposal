<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table            = 'tb_ruangan';
    protected $primaryKey       = 'id_ruangan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_ruangan', 'nama_ruangan'];

}
