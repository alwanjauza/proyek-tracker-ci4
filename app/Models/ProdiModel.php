<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'nama_prodi',
        'id_fakultas',
        'created_at',
        'updated_at'
    ];

    public function getProdiWithFakultas($prodiData)
    {
        foreach ($prodiData as $prodi) {
            $fakultasModel = new FakultasModel();
            $fakultas = $fakultasModel->find($prodi->id_fakultas);

            $prodi->fakultas = $fakultas;
        }

        return $prodiData;
    }

    public function search($keyword)
    {
        $result = $this->like('nama_prodi', $keyword)
            ->asObject()
            ->paginate(5, 'prodi');

        return $this->getProdiWithFakultas($result);
    }

    public function paginateProdi()
    {
        $result = $this->asObject()->paginate(5, 'prodi');
        return $this->getProdiWithFakultas($result);
    }
}
