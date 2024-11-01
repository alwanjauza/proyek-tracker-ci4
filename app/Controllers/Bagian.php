<?php

namespace App\Controllers;

class Bagian extends BaseController
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

    public function bagian()
    {
        $currentPage = $this->request->getVar('page_master_bagian') ? $this->request->getVar('page_master_bagian') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $bagian = $this->bagianModel->search($keyword);
        } else {
            $bagian = $this->bagianModel->asObject()->paginate(5, 'master_bagian');
        }

        $data = [
            'title' => 'List Bagian',
            'bagian' => $bagian,
            'pager' => $this->bagianModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword
        ];

        return view('admin/menu/bagian/list', $data);
    }

    public function formBagian()
    {
        $data = [
            'title' => 'Buat Bagian',
        ];

        return view('admin/menu/bagian/new', $data);
    }

    public function newBagian()
    {
        if (!$this->validate([
            'nama_bagian' => [
                'rules' => 'required|is_unique[master_bagian.nama_bagian]',
                'errors' => [
                    'required' => 'Nama bagian harus diisi',
                    'is_unique' => 'Nama bagian sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/new-bagian')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bagianModel->save([
            'nama_bagian' => $this->request->getPost('nama_bagian')
        ]);

        return redirect()->to('/admin/menus/bagian')->with('success', 'Bagian created successfully');
    }

    public function formEditBagian($id)
    {
        $data = [
            'title' => 'Edit Bagian',
            'bagian' => $this->bagianModel->asObject()->find($id),
        ];

        if (!$data['bagian']) {
            return redirect()->to('/admin/menus/bagian');
        }

        return view('admin/menu/bagian/edit', $data);
    }

    public function updateBagian($id)
    {
        if (!$this->validate([
            'nama_bagian' => [
                'rules' => 'required|is_unique[master_bagian.nama_bagian]',
                'errors' => [
                    'required' => 'Nama bagian harus diisi',
                    'is_unique' => 'Nama bagian sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/bagian/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bagianModel->update($id, [
            'nama_bagian' => $this->request->getPost('nama_bagian')
        ]);

        return redirect()->to('/admin/menus/bagian')->with('success', 'Bagian updated successfully');
    }

    public function deleteBagian($id)
    {
        if ($this->bagianModel->delete($id)) {
            return redirect()->to('/admin/menus/bagian')->with('success', 'Bagian deleted successfully');
        } else {
            return redirect()->to('/admin/menus/bagian')->with('error', 'Failed to delete bagian');
        }

        return redirect()->to('/admin/menus/bagian')->with('success', 'Bagian deleted successfully');
    }
}
