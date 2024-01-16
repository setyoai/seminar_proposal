<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDafSkripsi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dafskripsi' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'tanggal_dafskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nim_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'krs_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'transkrip_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'slip_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'keterangan_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'statusakhir_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_dafskripsi', true);
        $this->forge->createTable('tb_dafskripsi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dafskripsi');
    }
}
