<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user','username_user', 'password_user', 'level_userid'];

    public function cekLogin($username_user)
    {
        $query = $this->db->table('tb_user')
            ->select('tb_user.*, tb_dosen.id_dosen AS id_dosen')
            ->join('tb_dosen', 'tb_dosen.nidn_dosen = tb_user.username_user', 'left')
            ->where(['username_user' => $username_user])
            ->get();

        return $query->getRow();
    }

    public function getUserById($id_user)
    {
        return $this->where('id_user', $id_user)->get()->getRow();
    }

    function getAll()
    {
        $builder = $this->db->table('tb_user');
        $builder->select('tb_user.*, tb_dosen.nama_dosen AS nama_user, tb_dosen.nidn_dosen AS nidn_user, 
        tb_dosen.id_dosen AS id_dosen, tb_auth.level_nama');
        $builder->join('tb_dosen', 'tb_dosen.nidn_dosen = tb_user.username_user', 'left');
        $builder->join('tb_auth', 'tb_auth.level_nama = tb_user.level_userid', 'left');
        $query = $builder->get();
        return $query->getResult();
    }
}
