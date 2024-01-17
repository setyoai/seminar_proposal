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
                'nim_mhs' => '202455321',
                'nama_mhs' => 'Dian Permata',
                'password_mhs' => password_hash('123', PASSWORD_BCRYPT),
                'alamat_mhs' => 'Jakarta Selatan',
                'nohp_mhs' => '085712345678',
                'email_mhs' => 'dian.permata@gmail.com',
            ],
            [
                'nim_mhs' => '202188765',
                'nama_mhs' => 'Rini Indah',
                'password_mhs' => password_hash('1234', PASSWORD_BCRYPT),
                'alamat_mhs' => 'Surabaya',
                'nohp_mhs' => '081387654321',
                'email_mhs' => 'rini.indah@@gmail.com',
            ],

        ];
        $this->db->table('tb_mhs')->insertBatch($data);
    }
}
