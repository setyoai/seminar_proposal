<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SemproSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_mhs' => 1,
            'id_ruangan' => 1,
            'jam_sempro' => '11:30',
            'penguji1_sempro' => 'budi',
            'penguji2_sempro' => 'roni',
            'penguji3_sempro' => 'doni',
            'status_sempro' => 'menambah',
            'hasil_sempro' => 'diterima',
        ];
        $this->db->table('tb_sempro')->insert($data);
    }
}
