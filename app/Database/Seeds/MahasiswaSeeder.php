<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
       //multi user
        $data = [
            [
                'nim_mhs' => '201953073',
                'nama_mhs' => 'Setyo Adi Sasono',
                'password_mhs' => password_hash('12345', PASSWORD_BCRYPT),
                'alamat_mhs' => 'Grobogan',
                'nohp_mhs' => '081264323',
                'email_mhs' => 'setyoadisasono@gmail.com',
            ],
            [
                'nim_mhs' => '201953074',
                'nama_mhs' => 'Irfan Maulana',
                'password_mhs' => password_hash('12345', PASSWORD_BCRYPT),
                'alamat_mhs' => 'Grobogan',
                'nohp_mhs' => '081264323',
                'email_mhs' => 'irfanmaulana@gmail.com',
            ],

        ];
        $this->db->table('tb_mhs')->insertBatch($data);
    }
}
