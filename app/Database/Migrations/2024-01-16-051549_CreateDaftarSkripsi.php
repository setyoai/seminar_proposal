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
                'type'       => 'DATE',
                'null' => true,
            ],
            'nim_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'krs_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'transkrip_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'slip_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'status_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'keterangan_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'statusakhir_dafskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
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
