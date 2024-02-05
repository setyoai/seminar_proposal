<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBimbingan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bimbingan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'dosbingid_bimbingan' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'mhsnim_bimbingan' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'bab_bimbingan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'ket_bimbingan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'file_bimbingan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'tanggal_bimbingan' => [
                'type' => 'DATE',
            ],
            'dosenid_bimbingan' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'balasanfile_bimbingan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'balasanket_bimbingan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
            'balasantanggal_bimbingan' => [
                'type' => 'DATE',
                null => true,

            ],
            'status_bimbingan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                null => true,
            ],
        ]);
        $this->forge->addKey('id_bimbingan', true);
        $this->forge->createTable('tb_bimbingan');
    }

    public function down()
    {
        //
    }
}
