<?php

namespace App\Models;

use CodeIgniter\Model;

class BimbinganModel extends Model
{
    protected $table            = 'tb_bimbingan';
    protected $primaryKey       = 'id_bimbingan';

    protected $returnType       = 'object';
    protected $allowedFields    = [
        'id_bimbingan',
        'dosbingid_bimbingan',
        'mhsnim_bimbingan',
        'bab_bimbingan',
        'tanggal_bimbingan',
        'ket_bimbingan',
        'file_bimbingan',
        'dosenid_bimbingan',
        'balasanfile_bimbingan',
        'balasanket_bimbingan',
        'tanggalbalasan_bimbingan',
        'status_bimbingan'
    ];
    protected $useTimestamps = true;
    protected $createdField     = 'tanggal_bimbingan';
    protected $updatedField     = 'tanggalbalasan_bimbingan';

    public function getAll($dosenid_bimbingan = null)
    {
        $builder = $this->db->table('tb_bimbingan');
        $builder->select('tb_bimbingan.*, m.nama_mhs AS nama_mhs');

        $builder->join('tb_dosbing', 'tb_dosbing.id_dosbing = tb_bimbingan.dosbingid_bimbingan', 'left');
        $builder->join('tb_dafskripsi', 'tb_dafskripsi.id_dafskripsi = tb_dosbing.dafskripsiid_dosbing ', 'left');
        $builder->join('tb_mahasiswa m',    'm.nim_mhs = tb_dafskripsi.nim_dafskripsi', 'left');

        if ($dosenid_bimbingan!== null) {
            $builder->where('dosenid_bimbingan', $dosenid_bimbingan);
        }

        $query = $builder->get();
        return $query->getResult();
    }

    public function update_bimbingan($id, $data)
    {
        // Ensure $id is not empty
        if (!empty($id)) {
            // Add the where condition for the ID
            $this->where('id_bimbingan', $id);
            // Set the data to be updated
            $this->set($data);
            // Perform the update operation
            $this->update();
            // Check if any rows were affected
            if ($this->affectedRows() > 0) {
                return true; // Update successful
            } else {
                return false; // No rows updated
            }
        } else {
            return false; // ID is empty
        }
    }
}
