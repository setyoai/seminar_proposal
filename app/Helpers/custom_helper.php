<?php
function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('tb_user')->where('id_user', session('id_user'))->get()->getRow();
}