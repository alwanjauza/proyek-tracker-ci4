<?php

namespace App\Models;

use CodeIgniter\Model;

class BagianModel extends Model
{
    protected $table = 'master_bagian';
    protected $primaryKey = 'id_bagian';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_bagian', 'created_at', 'updated_at'];

    public function search($keyword)
    {
        return $this->table('master_bagian')->like('nama_bagian', $keyword)->asObject()->paginate(5, 'master_bagian');
    }
}
