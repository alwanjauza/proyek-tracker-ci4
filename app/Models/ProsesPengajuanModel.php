<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesPengajuanModel extends Model
{
    protected $table = 'proses_pengajuan';
    protected $primaryKey = 'id_proses';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_ajuan', 'tahapan', 'persentase', 'status', 'tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at'];
}
