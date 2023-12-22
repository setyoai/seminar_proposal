<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDaftarSempro extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dafsempro' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'transkrip_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'pengesahan_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'bukubimbingan_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'kwkomputer_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'kwinggris_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'kwkewirausahaan_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'slippembayaran_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'plagiasi_dafsempro' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_daftarsem' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'ket_daftarsem' => [
                'type' => 'DATE',
                null => true,

            ],
            'status_daftarsem' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_dafsempro', true);
        $this->forge->createTable('tb_dafsempro');
    }

    public function down()
    {
        $this->forge->dropTable('tb_dafsempro');
    }
}
