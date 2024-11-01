<?php

namespace App\Controllers;

class Fakultas extends BaseController
{
    protected $fakultasModel;

    public function __construct()
    {
        $this->fakultasModel = new \App\Models\FakultasModel();
    }

    public function fakultas()
    {
        $currentPage = $this->request->getVar('page_fakultas') ? $this->request->getVar('page_fakultas') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $fakultas = $this->fakultasModel->search($keyword);
        } else {
            $fakultas = $this->fakultasModel->asObject()->paginate(5, 'fakultas');
        }

        $data = [
            'title' => 'List Fakultas',
            'fakultas' => $fakultas,
            'pager' => $this->fakultasModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword
        ];

        return view('admin/menu/fakultas/list', $data);
    }

    public function formFakultas()
    {
        $data = [
            'title' => 'Buat Fakultas',
        ];

        return view('admin/menu/fakultas/new', $data);
    }

    public function newFakultas()
    {
        if (!$this->validate([
            'nama_fakultas' => [
                'rules' => 'required|is_unique[fakultas.nama_fakultas]',
                'errors' => [
                    'required' => 'Nama fakultas harus diisi',
                    'is_unique' => 'Nama fakultas sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/new-fakultas')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->fakultasModel->save([
            'nama_fakultas' => $this->request->getVar('nama_fakultas')
        ]);

        return redirect()->to('/admin/menus/fakultas')->with('message', 'Data berhasil ditambahkan');
    }

    public function formEditFakultas($id)
    {
        $data = [
            'title' => 'Edit Fakultas',
            'fakultas' => $this->fakultasModel->asObject()->find($id)
        ];

        return view('admin/menu/fakultas/edit', $data);
    }

    public function updateFakultas($id)
    {
        if (!$this->validate([
            'nama_fakultas' => [
                'rules' => 'required|is_unique[fakultas.nama_fakultas]',
                'errors' => [
                    'required' => 'Nama fakultas harus diisi',
                    'is_unique' => 'Nama fakultas sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/admin/menus/fakultas/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->fakultasModel->update($id, [
            'nama_fakultas' => $this->request->getVar('nama_fakultas')
        ]);

        return redirect()->to('/admin/menus/fakultas')->with('message', 'Data berhasil diubah');
    }

    public function deleteFakultas($id)
    {
        if ($this->fakultasModel->delete($id)) {
            return redirect()->to('/admin/menus/fakultas')->with('success', 'Jenis deleted successfully');
        } else {
            return redirect()->to('/admin/menus/fakultas')->with('failed', 'Jenis failed to delete');
        }

        return redirect()->to('/admin/menus/fakultas')->with('message', 'Data berhasil dihapus');
    }
}
