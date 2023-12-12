<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //single user
        $data = [
        'username_user' => 'budi@gmail.com',
        'password_user' => password_hash('12345', PASSWORD_BCRYPT),
        'user_status' => 'koordinator'
        ];
        $this->db->table('tb_user')->insert($data);

        //multi user
        $data = [
            [
                'username_user' => 'budi@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
                'user_status' => 'koordinator'
            ],
            [
                'username_user' => 'rodi@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
                'user_status' => 'dosen'
            ],

        ];
        $this->db->table('tb_user')->insertBatch($data);
    }
}
