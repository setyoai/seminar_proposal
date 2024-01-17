<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePriode extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_periode' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'semester_periode' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'tahunakademik_periode' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'selesai_periode' => [
                'type' => 'DATE',
                null => true,
            ],
            'koordinator_periode' => [
                'type' => 'INT',
                null => true,
            ],
            'statusaktif_periode' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],

        ]);
        $this->forge->addKey('id_periode', true);
        $this->forge->createTable('tb_periode');
    }

    public function down()
    {
        $this->forge->dropTable('tb_periode');
    }
}
