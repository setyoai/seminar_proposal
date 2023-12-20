<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSempro extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sempro' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_mhs' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'id_ruangan' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'jam_sempro' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'tanggal_sempro' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'penguji1_sempro' => [
                'type' => 'TEXT',
                'constraint' => '100',
            ],
            'penguji2_sempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'penguji3_sempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'hasil_sempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status_sempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_sempro', true);
        $this->forge->addForeignKey('id_mhs', 'tb_mhs', 'id_mhs');
        $this->forge->addForeignKey('id_ruangan', 'tb_ruangan', 'id_ruangan');
        $this->forge->createTable('tb_sempro');
    }

    public function down()
    {
        $this->forge->dropForeignKey('tb_sempro', 'tb_sempro_id_mhs_foreign');
        $this->forge->dropForeignKey('tb_sempro', 'tb_sempro_id_ruangan_foreign');
        $this->forge->dropTable('tb_sempro');
    }
}
