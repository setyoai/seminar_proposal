<?php

use Config\Database;

function userLogin()
{
    $db = Database::connect();
    $userData = $db->table('tb_user')
        ->join('tb_dosen', 'tb_user.id_user = tb_dosen.id_dosen', 'left') // Replace 'another_table' with the actual table name and set the join condition accordingly
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