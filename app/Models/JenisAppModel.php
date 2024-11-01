<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisAppModel extends Model
{
    protected $table = 'master_jenis_app';
    protected $primaryKey = 'id_jenis_app';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'created_at', 'updated_at'];

    public function search($keyword)
    {
        return $this->table('master_jenis_app')->like('nama', $keyword)->asObject()->paginate(5, 'master_jenis_app');
    }
}
