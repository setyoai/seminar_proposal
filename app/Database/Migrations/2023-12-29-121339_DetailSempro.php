<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailSempro extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detsempro' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_dafsempro' => [
                'type'           => 'INT',
            ],
            'id_sempro' => [
                'type'           => 'INT',
            ],
            'id_dosen' => [
                'type'           => 'INT',
            ],
            'leveldosen_detsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'ketrev_detsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'tanggal_detsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],

        ]);
        $this->forge->addKey('id_detsempro', true);
        $this->forge->addForeignKey('id_dosen', 'tb_dosen', 'id_dosen');
        $this->forge->addForeignKey('id_dafsempro', 'tb_dafsempro', 'id_dafsempro');
        $this->forge->addForeignKey('id_sempro', 'tb_sempro', 'id_sempro');
        $this->forge->createTable('tb_detsempro');
    }

    public function down()
    {
        //
    }
}
