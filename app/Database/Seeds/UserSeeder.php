<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // single user
//        $data = [
//        'id_user' => 1,
//        'username_user' => 'budi@gmail.com',
//        'password_user' => password_hash('12345', PASSWORD_BCRYPT),
//        'level_userid' => 1
//        ];
//        $this->db->table('tb_user')->insert($data);

        //multi user
        $data = [
            [
                'id_user' => 13,
                'username_user' => 'budi@gmail.com',
                'password_user' => password_hash('1234', PASSWORD_BCRYPT),
                'level_userid' => 1
            ],
            [
                'id_user' => 2,
                'username_user' => 'roni@gmail.com',
                'password_user' => password_hash('1234', PASSWORD_BCRYPT),
                'level_userid' => 2
            ],

        ];
        $this->db->table('tb_user')->insertBatch($data);
    }
}
