<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDosbing extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dosbing' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_dafskripsi' => [
                'type'       => 'INT',
                null => true,

            ],
            'dosen1_dosbing' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'dosen2_dosbing' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'tanggal_dosbing' => [
                'type' => 'DATE',
                null => true,
            ],
        ]);
        $this->forge->addKey('id_dosbing', true);
        $this->forge->createTable('tb_dosbing');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dosbing');
    }
}
