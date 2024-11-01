<?php

namespace App\Models;

use CodeIgniter\Model;

class TimItModel extends Model
{
    protected $table = 'tim_it';
    protected $primaryKey = 'id_tim';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_tim', 'anggota_tim', 'created_at', 'updated_at'];

    public function getTimWithDetails($timData)
    {
        foreach ($timData as $tim) {
            $anggotaIds = json_decode($tim->anggota_tim, true);

            if (!empty($anggotaIds)) {
                $builder = $this->db->table('users');
                $builder->select('username, fullname');
                $builder->whereIn('id', $anggotaIds);
                $query = $builder->get();

                $tim->anggota_detail = $query->getResult();
            } else {
                $tim->anggota_detail = [];
            }
        }

        return $timData;
    }

    public function search($keyword)
    {
        $result = $this->like('nama_tim', $keyword)
            ->asObject()
            ->paginate(5, 'tim_it');

        return $this->getTimWithDetails($result);
    }

    public function paginateTim()
    {
        $result = $this->asObject()->paginate(5, 'tim_it');
        return $this->getTimWithDetails($result);
    }
}
