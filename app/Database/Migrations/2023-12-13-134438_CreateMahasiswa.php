<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mhs' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'auto_increment' => true,
            ],
            'nim_mhs' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
            ],
            'nama_mhs' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password_mhs' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_mhs' => [
                'type' => 'TEXT',
                'constraint' => '100',
            ],
            'nohp_mhs' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email_mhs' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status_mhs' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_mhs', true);
        $this->forge->createTable('tb_mhs');
    }

    public function down()
    {
        $this->forge->dropTable('tb_mhs');
    }
}
