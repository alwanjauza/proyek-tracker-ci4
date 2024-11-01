<?php

namespace App\Controllers;

class TimIt extends BaseController
{
    protected $db, $builder;
    protected $bagianModel;
    protected $jenisAppModel;
    protected $timItModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->bagianModel = new \App\Models\BagianModel();
        $this->jenisAppModel = new \App\Models\JenisAppModel();
        $this->timItModel = new \App\Models\TimItModel();
    }

    public function timIt()
    {
        $currentPage = $this->request->getVar('page_tim_it') ? $this->request->getVar('page_tim_it') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $timIt = $this->timItModel->search($keyword);
        } else {
            $timIt = $this->timItModel->paginateTim();
        }

        $data = [
            'title' => 'List Tim',
            'timIt' => $timIt,
            'pager' => $this->timItModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword
        ];

        return view('admin/menu/tim/list', $data);
    }

    public function formTimIt()
    {
        $data = [
            'title' => 'Buat Tim',
            'users' => $this->builder->select('id, username, fullname')->get()->getResult(),
        ];

        return view('admin/menu/tim/new', $data);
    }

    public function newTimIt()
    {
        $namaTim = $this->request->getPost('nama_tim');
        $anggotaTim = $this->request->getPost('anggota_tim');

        if (!$this->validate([
            'nama_tim' => [
                'rules' => 'required|is_unique[tim_it.nama_tim]',
                'errors' => [
                    'required' => 'Nama tim harus diisi',
                    'is_unique' => 'Nama tim sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/new-tim')->withInput()->with('errors', $this->validator->getErrors());
        }

        if (is_array($anggotaTim)) {
            $timData = [
                'nama_tim' => $namaTim,
                'anggota_tim' => json_encode($anggotaTim)
            ];

            $this->timItModel->save($timData);

            return redirect()->to('/admin/menus/tim')->with('success', 'Tim created successfully');
        } else {
            return redirect()->to('/admin/menus/tim')->with('error', 'Failed to create tim');
        }
    }

    public function formEditTimIt($id)
    {
        $data = [
            'title' => 'Edit Tim',
            'timIt' => $this->timItModel->asObject()->find($id),
            'users' => $this->builder->select('id, username, fullname')->get()->getResult(),
        ];

        if (!$data['timIt']) {
            return redirect()->to('/admin/menus/tim');
        }

        return view('admin/menu/tim/edit', $data);
    }

    public function updateTimIt($id)
    {
        $namaTim = $this->request->getPost('nama_tim');
        $anggotaTim = $this->request->getPost('anggota_tim');

        if (!$this->validate([
            'nama_tim' => [
                'rules' => 'required|is_unique[tim_it.nama_tim]',
                'errors' => [
                    'required' => 'Nama tim harus diisi',
                    'is_unique' => 'Nama tim sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/tim/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        if (is_array($anggotaTim)) {
            $timData = [
                'nama_tim' => $namaTim,
                'anggota_tim' => json_encode($anggotaTim)
            ];

            $this->timItModel->update($id, $timData);

            return redirect()->to('/admin/menus/tim')->with('success', 'Tim updated successfully');
        } else {
            return redirect()->to('/admin/menus/tim')->with('error', 'Failed to update tim');
        }
    }

    public function deleteTimIt($id)
    {
        if ($this->timItModel->delete($id)) {
            return redirect()->to('/admin/menus/tim')->with('success', 'Tim deleted successfully');
        } else {
            return redirect()->to('/admin/menus/tim')->with('error', 'Failed to delete tim');
        }
    }
}
