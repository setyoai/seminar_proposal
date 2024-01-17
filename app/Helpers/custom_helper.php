<?php

use Config\Database;

function userLogin()
{
    $db = Database::connect();
    $userData = $db->table('tb_user')
        ->select('tb_user.*, tb_dosen.nama_dosen AS nama_user')
        ->join('tb_dosen', 'tb_dosen.nidn_dosen = tb_user.username_user', 'left') // Replace 'another_table' with the actual table name and set the join condition accordingly
        ->where('tb_user.id_user', session('id_user'))
        ->get()
        ->getRow();

//    return $db->table('tb_user')->where('id_user', session('id_user'))->get()->getRow();
    return $userData ;
}

function countData($table)
{
    $db = Database::connect();
    return $db->table($table)->countAllResults();
}