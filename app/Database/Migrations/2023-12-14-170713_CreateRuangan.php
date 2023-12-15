<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ruangan' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'auto_increment' => true,
            ],
            'nama_ruangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

        ]);
        $this->forge->addKey('id_ruangan', true);
        $this->forge->createTable('tb_ruangan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_ruangan');
    }
}
