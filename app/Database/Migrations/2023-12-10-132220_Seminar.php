<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seminar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dosen' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'auto_increment' => true,
            ],
            'nidn_dosen' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nohp_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_dosen', true);
        $this->forge->createTable('tb_dosen');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dosen');
    }
}
