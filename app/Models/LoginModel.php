<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
//    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'username_user', 'password_user', 'level_userid'];


}
