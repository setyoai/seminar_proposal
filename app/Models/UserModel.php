<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'username_user', 'password_user', 'level_userid'];

    function getAll()
    {
        $builder = $this->db->table('tb_user');
        $builder->select('tb_user.*, tb_dosen.nama_dosen, tb_auth.level_nama');
        $builder->join('tb_dosen', 'tb_dosen.id_dosen = tb_user.id_user', 'left');
        $builder->join('tb_auth', 'tb_auth.id_auth = tb_user.level_userid', 'left');
        $query = $builder->get();
        return $query->getResult();
    }
}
