<?php

use Config\Database;

function userLogin()
{
    $db = Database::connect();
    return $db->table('tb_user')->where('id_user', session('id_user'))->get()->getRow();
}

function countData($table)
{
    $db = Database::connect();
    return $db->table($table)->countAllResults();
}