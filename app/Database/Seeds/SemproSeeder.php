<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SemproSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_mhs' => 2,
            'id_ruangan' => 1,
            'penguji1_sempro' => 'daniel',
            'penguji2_sempro' => 'roni',
            'penguji3_sempro' => 'doni',
            'status_sempro' => 'menambah',
            'hasil_sempro' => 'ditolak',
        ];
        $this->db->table('tb_sempro')->insert($data);
    }
}
