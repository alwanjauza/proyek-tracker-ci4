<?php

namespace App\Controllers;

class JenisApp extends BaseController
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

    public function jenisApp()
    {
        $currentPage = $this->request->getVar('page_master_jenis_app') ? $this->request->getVar('page_master_jenis_app') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $jenisApp = $this->jenisAppModel->search($keyword);
        } else {
            $jenisApp = $this->jenisAppModel->asObject()->paginate(5, 'master_jenis_app');
        }

        $data = [
            'title' => 'List Jenis',
            'jenisApp' => $jenisApp,
            'pager' => $this->jenisAppModel->pager,
            'currentPage' => $currentPage
        ];

        return view('admin/menu/jenis/list', $data);
    }

    public function formJenisApp()
    {
        $data = [
            'title' => 'Buat Jenis',
        ];

        return view('admin/menu/jenis/new', $data);
    }

    public function newJenisApp()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[master_jenis_app.nama]',
                'errors' => [
                    'required' => 'Nama jenis harus diisi',
                    'is_unique' => 'Nama jenis sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/new-jenis')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->jenisAppModel->save([
            'nama' => $this->request->getPost('nama')
        ]);

        return redirect()->to('/admin/menus/jenis')->with('success', 'Jenis created successfully');
    }

    public function formEditJenisApp($id)
    {
        $data = [
            'title' => 'Edit Jenis',
            'jenisApp' => $this->jenisAppModel->asObject()->find($id)
        ];

        if (!$data['jenisApp']) {
            return redirect()->to('/admin/menus/jenis');
        }

        return view('admin/menu/jenis/edit', $data);
    }

    public function updateJenisApp($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[master_jenis_app.nama]',
                'errors' => [
                    'required' => 'Nama jenis harus diisi',
                    'is_unique' => 'Nama jenis sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/jenis/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->jenisAppModel->update($id, [
            'nama' => $this->request->getPost('nama')
        ]);

        return redirect()->to('/admin/menus/jenis')->with('success', 'Jenis updated successfully');
    }

    public function deleteJenisApp($id)
    {
        if ($this->jenisAppModel->delete($id)) {
            return redirect()->to('/admin/menus/jenis')->with('success', 'Jenis deleted successfully');
        } else {
            return redirect()->to('/admin/menus/jenis')->with('error', 'Failed to delete jenis');
        }

        return redirect()->to('/admin/menus/jenis')->with('success', 'Jenis deleted successfully');
    }
}
