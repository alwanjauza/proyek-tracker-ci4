<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class Ajuan extends BaseController
{
    protected $db;
    protected $ajuanModel;
    protected $jenisAppModel;
    protected $bagianModel;
    protected $timItModel;
    protected $progresModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->ajuanModel = new \App\Models\AjuanModel();
        $this->jenisAppModel = new \App\Models\JenisAppModel();
        $this->bagianModel = new \App\Models\BagianModel();
        $this->timItModel = new \App\Models\TimItModel();
        $this->progresModel = new \App\Models\ProgresModel();
    }

    public function exportPDF()
    {
        $options = new Options();
        $options->set('defaultFont', 'Times-Roman');

        $dompdf = new Dompdf($options);

        $currentMonth = date('n');

        if ($currentMonth <= 6) {
            $startDate = date('Y') . '-01-01';
            $endDate = date('Y') . '-06-30';
            $periode = 'jan-jun';
        } else {
            $startDate = date('Y') . '-07-01';
            $endDate = date('Y') . '-12-31';
            $periode = 'jul-des';
        }

        $html = view('user/pembuatan/export_pdf', [
            'project' => $this->ajuanModel
                ->select('tabel_ajuan.*, users.fullname, master_jenis_app.nama as jenis_app_name, tim_it.nama_tim')
                ->join('users', 'users.id = tabel_ajuan.id_user', 'left')
                ->join('master_jenis_app', 'master_jenis_app.id_jenis_app = tabel_ajuan.id_jenis_app', 'left')
                ->join('tim_it', 'tim_it.id_tim = tabel_ajuan.id_tim', 'left')
                ->where('tabel_ajuan.jenis_ajuan', 'Pengembangan Aplikasi')
                ->where('tabel_ajuan.created_at >=', $startDate)
                ->where('tabel_ajuan.created_at <=', $endDate)
                ->asObject()
                ->findAll()
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $filename = 'laporan-pengembangan-aplikasi-' . $periode . '.pdf';
        $dompdf->stream($filename, ['Attachment' => 0]);
    }

    public function ajuan()
    {
        $data = [
            'title' => 'List Ajuan Pengembangan Aplikasi',
            'project' => $this->ajuanModel
                ->select('tabel_ajuan.*, users.fullname, master_jenis_app.nama as jenis_app_name, tim_it.nama_tim')
                ->join('users', 'users.id = tabel_ajuan.id_user', 'left')
                ->join('master_jenis_app', 'master_jenis_app.id_jenis_app = tabel_ajuan.id_jenis_app', 'left')
                ->join('tim_it', 'tim_it.id_tim = tabel_ajuan.id_tim', 'left')
                ->where('tabel_ajuan.jenis_ajuan', 'Pengembangan Aplikasi')
                ->asObject()
                ->findAll(),
        ];

        return view('user/ajuan/list', $data);
    }

    public function newAjuan()
    {
        $data = [
            'title' => 'Ajuan Pengembangan Aplikasi',
            'bagian' => $this->bagianModel->findAll(),
            'jenisApp' => $this->jenisAppModel->findAll(),
            'tim' => $this->timItModel->findAll(),
        ];

        return view('user/ajuan/new', $data);
    }

    public function createAjuan()
    {
        if (!$this->validate([
            'nama_aplikasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama aplikasi harus diisi',
                ]
            ],
            'id_jenis_app' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis aplikasi harus dipilih',
                ]
            ],
            'id_bagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bagian harus dipilih',
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]',
                'errors' => [
                    'uploaded' => 'File harus diunggah.',
                ],
            ],
        ])) {
            return redirect()->to('/project/new-project')->withInput()->with('errors', $this->validator->getErrors());
        }

        if (!user()->fullname || !user()->no_identitas || !user()->id_fakultas || !user()->id_prodi) {
            return redirect()->to('/project/new-project')->with('error', 'Lengkapi profil terlebih dahulu!');
        }

        $file = $this->request->getFile('file');
        $filePath = null;

        if ($file->isValid() && !$file->hasMoved()) {
            $userName = str_replace(' ', '_', strtolower(user()->fullname));
            $date = date('d-m-Y');
            $extension = $file->getClientExtension();

            $fileName = "ajuan-{$userName}-{$date}.{$extension}";
            $filePath = 'uploads/pengembangan_apps_files/' . $fileName;
            $file->move('uploads/pengembangan_apps_files', $fileName);
        } else {
            return redirect()->to('/project/new-project')->with('error', 'File upload gagal!');
        }

        $this->ajuanModel->save([
            'id_user' => user_id(),
            'id_bagian' => $this->request->getPost('id_bagian'),
            'id_jenis_app' => $this->request->getPost('id_jenis_app'),
            'id_tim' => $this->request->getPost('id_tim'),
            'jenis_ajuan' => 'Pengembangan Aplikasi',
            'percentage' => 0,
            'tahap_saat_ini' => 'pengajuan',
            'status' => 'on_review',
            'fungsi' => $this->request->getPost('fungsi'),
            'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'file_path' => $filePath,
        ]);

        return redirect()->to('/project/data')->with('success', 'Ajuan berhasil dibuat.');
    }


    public function viewValidateAjuan($id)
    {
        $data = [
            'title' => 'Validasi Project',
            'ajuan' => $this->ajuanModel->find($id),
            'bagian' => $this->bagianModel->findAll(),
            'jenisApp' => $this->jenisAppModel->findAll(),
            'tim' => $this->timItModel->findAll(),
            'history' => $this->progresModel->where('id_ajuan', $id)->findAll(),
        ];

        return view('user/ajuan/validate', $data);
    }

    public function validateAjuan($id_ajuan)
    {
        $action = $this->request->getPost('action');

        $ajuan = $this->ajuanModel->find($id_ajuan);

        if (!$ajuan) {
            return redirect()->back()->with('error', 'Pengajuan tidak ditemukan');
        }

        if ($action == 'reject') {
            $this->ajuanModel->update($id_ajuan, [
                'status' => 'rejected',
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $this->progresModel->save([
                'id_ajuan' => $id_ajuan,
                'tahap' => $ajuan['tahap_saat_ini'],
                'tanggal_mulai' => date('Y-m-d H:i:s'),
                'keterangan' => "Pengajuan ditolak pada tahap {$ajuan['tahap_saat_ini']}"
            ]);

            return redirect()->back()->with('message', 'Pengajuan ditolak.');
        }

        switch ($ajuan['tahap_saat_ini']) {
            case 'Pengajuan':
                $newStage = 'Validasi Tim IT';
                $newPercentage = 10;
                break;
            case 'Validasi Tim IT':
                $newStage = 'Perencanaan';
                $newPercentage = 20;
                break;
            case 'Perencanaan':
                $newStage = 'Analisa';
                $newPercentage = 40;
                break;
            case 'Analisa':
                $newStage = 'Pembuatan';
                $newPercentage = 80;
                break;
            case 'Pembuatan':
                $newStage = 'Review Implementasi';
                $newPercentage = 90;
                break;
            case 'Review Implementasi':
                $newStage = 'Done';
                $newPercentage = 100;
                break;
            default:
                return redirect()->to('/project/data')->with('message', 'Proyek sudah selesai.');
        }

        $this->progresModel->where('id_ajuan', $id_ajuan)
            ->where('tahap', $ajuan['tahap_saat_ini'])
            ->set('tanggal_selesai', date('Y-m-d H:i:s'))
            ->update();

        $dataAjuan = [
            'tahap_saat_ini' => $newStage,
            'percentage' => $newPercentage,
            'status' => $newStage == 'Done' ? 'Done' : 'on_review',
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($ajuan['tahap_saat_ini'] == 'validasi_tim_it') {
            $dataAjuan['id_tim'] = $this->request->getPost('id_tim');
        }

        $this->ajuanModel->update($id_ajuan, $dataAjuan);

        $this->progresModel->save([
            'id_ajuan' => $id_ajuan,
            'tahap' => $newStage,
            'tanggal_mulai' => date('Y-m-d H:i:s'),
            'keterangan' => "Tahap {$newStage} dimulai"
        ]);

        return redirect()->to('/project/data')->with('message', 'Tahapan berhasil diperbarui.');
    }


    public function editAjuan($id)
    {
        $data = [
            'title' => 'Edit Project',
            'ajuan' => $this->ajuanModel->asObject()->find($id),
            'bagian' => $this->bagianModel->findAll(),
            'jenisApp' => $this->jenisAppModel->findAll(),
            'tim' => $this->timItModel->findAll(),
            'file_path' => isset($ajuan['file_path']) ? $ajuan['file_path'] : ''
        ];

        return view('user/ajuan/edit', $data);
    }

    public function updateAjuan($id)
    {
        $this->db->transBegin();

        try {
            $ajuan = $this->ajuanModel->find($id);

            if (!$ajuan) {
                return redirect()->to('/project/data')->with('error', 'Ajuan tidak ditemukan.');
            }

            if (in_groups('admin')) {
                $data['id_tim'] = $this->request->getPost('id_tim');
            }

            $file = $this->request->getFile('file');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $namaFile = $file->getRandomName();
                $file->move('uploads/pengembangan_apps_files', $namaFile);

                if (!empty($ajuan['file_path']) && file_exists($ajuan['file_path'])) {
                    unlink($ajuan['file_path']);
                }
            } else {
                $namaFile = basename($ajuan['file_path']);
            }

            $data = [
                'id_bagian' => $this->request->getPost('id_bagian'),
                'id_jenis_app' => $this->request->getPost('id_jenis_app'),
                'fungsi' => $this->request->getPost('fungsi'),
                'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'file_path' => 'uploads/pengembangan_apps_files/' . $namaFile,
            ];

            $this->ajuanModel->update($id, $data);

            $this->db->transCommit();

            return redirect()->to('/project/data')->with('message', 'Ajuan berhasil diperbarui.');
        } catch (\Exception $e) {
            $this->db->transRollback();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui ajuan.');
        }
    }

    public function viewAjuan($id)
    {
        $data = [
            'ajuan' => $this->ajuanModel->asObject()->find($id),
            'bagian' => $this->bagianModel->findAll(),
            'jenisApp' => $this->jenisAppModel->findAll(),
            'tim' => $this->timItModel->findAll(),
            'history' => $this->progresModel->where('id_ajuan', $id)->findAll(),
        ];

        return view('user/ajuan/view', $data);
    }

    public function deleteAjuan($id_ajuan)
    {
        $this->db->transBegin();

        try {
            $ajuan = $this->ajuanModel->find($id_ajuan);

            if ($ajuan && !empty($ajuan['file_path'])) {
                $file_path = WRITEPATH . '../public/' . $ajuan['file_path'];

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            $this->progresModel->where('id_ajuan', $id_ajuan)->delete();

            $this->ajuanModel->delete($id_ajuan);

            $this->db->transCommit();

            return redirect()->to('/project/data')->with('message', 'Pengajuan dan file berhasil dihapus.');
        } catch (\Exception $e) {
            $this->db->transRollback();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus pengajuan.');
        }
    }


    public function formPengembanganAplikasi()
    {
        $data = [
            'title' => 'Form Pengembangan Aplikasi',
            'bagian' => $this->bagianModel->findAll(),
            'jenisApp' => $this->jenisAppModel->findAll(),
            'tim' => $this->timItModel->findAll(),
        ];

        return view('user/ajuan/form_pengembangan_aplikasi', $data);
    }

    public function createPengembanganAplikasi()
    {
        if (!$this->validate([
            'nama_aplikasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama aplikasi harus diisi',
                ]
            ],
            'id_jenis_app' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis aplikasi harus dipilih',
                ]
            ],
            'id_bagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bagian harus dipilih',
                ]
            ],
        ])) {
            return redirect()->to('/project/form-pengembangan-aplikasi')->withInput()->with('errors', $this->validator->getErrors());
        }

        if (!user()->fullname || !user()->no_identitas || !user()->id_fakultas || !user()->id_prodi) {
            return redirect()->to('/project/form-pengembangan-aplikasi')->with('error', 'Lengkapi profil terlebih dahulu!');
        }

        $this->ajuanModel->save([
            'id_user' => user_id(),
            'id_bagian' => $this->request->getPost('id_bagian'),
            'id_jenis_app' => $this->request->getPost('id_jenis_app'),
            'id_tim' => $this->request->getPost('id_tim'),
            'percentage' => 0,
            'tahap_saat_ini' => 'pengajuan',
            'status' => 'on_review',
            'fungsi' => $this->request->getPost('fungsi'),
            'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/project/data');
    }
}
