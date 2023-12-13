<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
//        // single user
//        $data = [
//        'username_user' => 'budi@gmail.com',
//        'password_user' => password_hash('12345', PASSWORD_BCRYPT),
//        'status_user' => 'koordinator'
//        ];
//        $this->db->table('tb_user')->insert($data);

//        //multi user
        $data = [
            [
                'username_user' => 'roni@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
                'status_user' => 'operator'
            ],
            [
                'username_user' => 'rodi@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
                'status_user' => 'dosen'
            ],

        ];
        $this->db->table('tb_user')->insertBatch($data);
    }
}
