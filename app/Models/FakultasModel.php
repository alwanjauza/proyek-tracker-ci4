<?php

namespace App\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'nama_fakultas',
        'created_at',
        'updated_at'
    ];

    public function search($keyword)
    {
        return $this->table('fakultas')->like('nama_fakultas', $keyword)->asObject()->paginate(5, 'fakultas');
    }
}
