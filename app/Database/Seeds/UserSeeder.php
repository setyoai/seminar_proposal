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
//        $authData = [
//            ['level_nama' => 1],
//            ['level_nama' => 2],
//            // ... other auth data
//        ];
//        $this->db->table('tb_auth')->insertBatch($authData);

        $data = [
            [
                'username_user' => '1234567890',
                'password_user' => password_hash('1234', PASSWORD_BCRYPT),
                'level_userid' => 'Koordinator'
            ],
            [
                'username_user' => '0987654321',
                'password_user' => password_hash('1234', PASSWORD_BCRYPT),
                'level_userid' => 'Operator'
            ],

        ];
        $this->db->table('tb_user')->insertBatch($data);
    }
}
