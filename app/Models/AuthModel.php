<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'tb_auth';
    protected $primaryKey       = 'id_auth';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_auth', 'level_nama'];


}
