<?php

namespace App\Models;

use CodeIgniter\Model;

class AjuanModel extends Model
{
    protected $table = 'tabel_ajuan';
    protected $primaryKey = 'id_ajuan';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'id_ajuan',
        'id_user',
        'id_bagian',
        'id_jenis_app',
        'id_tim',
        'jenis_ajuan',
        'waktu_kerja',
        'fungsi',
        'nama_aplikasi',
        'file_path',
        'deskripsi',
        'percentage',
        'tahap_saat_ini',
        'status',
        'created_at',
        'updated_at'
    ];
}
