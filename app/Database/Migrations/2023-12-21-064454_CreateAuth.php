<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuth extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,

            ],
            'level_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

        ]);
        $this->forge->addForeignKey('id_user', 'tb_user', 'id_user');
        $this->forge->createTable('tb_auth');
    }

    public function down()
    {
        //
    }
}
