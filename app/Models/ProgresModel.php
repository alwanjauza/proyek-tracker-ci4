<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgresModel extends Model
{
    protected $table = 'tabel_log_progress';
    protected $primaryKey = 'id_log';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'id_log',
        'id_ajuan',
        'tahap',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'created_at',
        'updated_at'
    ];
}
