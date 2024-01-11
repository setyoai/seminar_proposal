<?php

namespace App\Models;

use CodeIgniter\Model;

class DafSemproModel extends Model
{
    protected $table            = 'tb_dafsempro';
    protected $primaryKey       = 'id_dafsempro';

    protected $returnType       = 'object';

    protected $allowedFields    = [
        'id_dafsempro',
        'transkrip_dafsempro',
        'pengesahan_dafsempro',
        'bukubimbingan_dafsempro',
        'kwkomputer_dafsempro',
        'kwinggris_dafsempro',
        'kwkewirausahaan_dafsempro',
        'slippembayaran_dafsempro',
        'plagiasi_dafsempro',
        'tanggal_dafsempro',
        'status_dafsempro',
        'ket_dafsempro',
        'judul',
    ];

}
