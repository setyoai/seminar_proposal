<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJudulSkripsi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_judul' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'judul_skripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'tahun_skripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
        ]);
        $this->forge->addKey('id_judul', true);
        $this->forge->createTable('tb_judulskripsi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_judulskripsi');
    }
}
