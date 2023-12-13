<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'auto_increment' => true,
            ],
            'username_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password_user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status_user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],

        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tb_user');
    }

    public function down() {
        $this->forge->dropTable('tb_user');
    }
}
