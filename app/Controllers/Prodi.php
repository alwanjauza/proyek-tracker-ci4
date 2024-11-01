<?php

namespace App\Controllers;

class Prodi extends BaseController
{
    protected $fakultasModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->fakultasModel = new \App\Models\FakultasModel();
        $this->prodiModel = new \App\Models\ProdiModel();
    }

    public function prodi()
    {
        $currentPage = $this->request->getVar('page_prodi') ? $this->request->getVar('page_prodi') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $prodi = $this->prodiModel->search($keyword);
        } else {
            $prodi = $this->prodiModel->paginateProdi();
        }

        $data = [
            'title' => 'List Prodi',
            'prodi' => $prodi,
            'pager' => $this->prodiModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword
        ];

        return view('admin/menu/prodi/list', $data);
    }

    public function formProdi()
    {
        $data = [
            'title' => 'Buat Prodi',
            'fakultas' => $this->fakultasModel->asObject()->findAll()
        ];

        return view('admin/menu/prodi/new', $data);
    }

    public function newProdi()
    {
        if (!$this->validate([
            'nama_prodi' => [
                'rules' => 'required|is_unique[prodi.nama_prodi]',
                'errors' => [
                    'required' => 'Nama prodi harus diisi',
                    'is_unique' => 'Nama prodi sudah ada'
                ]
            ],
            'id_fakultas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fakultas harus dipilih'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/new-prodi')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->prodiModel->save([
            'id_fakultas' => $this->request->getVar('id_fakultas'),
            'nama_prodi' => $this->request->getVar('nama_prodi')
        ]);

        return redirect()->to('/admin/menus/prodi')->with('message', 'Data berhasil ditambahkan');
    }

    public function formEditProdi($id)
    {
        $data = [
            'title' => 'Edit Prodi',
            'prodi' => $this->prodiModel->asObject()->find($id),
            'fakultas' => $this->fakultasModel->asObject()->findAll()
        ];

        return view('admin/menu/prodi/edit', $data);
    }

    public function updateProdi($id)
    {
        if (!$this->validate([
            'nama_prodi' => [
                'rules' => 'required|is_unique[prodi.nama_prodi]',
                'errors' => [
                    'required' => 'Nama prodi harus diisi',
                    'is_unique' => 'Nama prodi sudah ada'
                ]
            ],
            'id_fakultas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fakultas harus dipilih'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/prodi/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->prodiModel->update($id, [
            'nama_prodi' => $this->request->getVar('nama_prodi'),
            'id_fakultas' => $this->request->getVar('id_fakultas')
        ]);

        return redirect()->to('/admin/menus/prodi')->with('message', 'Data berhasil diubah');
    }

    public function deleteProdi($id)
    {
        if ($this->prodiModel->delete($id)) {
            return redirect()->to('/admin/menus/prodi')->with('success', 'Jenis deleted successfully');
        } else {
            return redirect()->to('/admin/menus/prodi')->with('failed', 'Jenis failed to delete');
        }

        return redirect()->to('/admin/menus/prodi')->with('message', 'Data berhasil dihapus');
    }
}
