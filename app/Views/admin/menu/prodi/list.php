<?php $this->extend('templates/index'); ?>

<?php $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Daftar Prodi </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="page-header">
                            <h4 class="card-title">Daftar Prodi</h4>
                            <button type="button" class="btn btn-inverse-success btn-fw" onclick="window.location.href='<?= base_url('admin/menus/new-prodi'); ?>'"><i class="mdi mdi-plus"></i></button>
                        </div>
                        <div class="row">
                            <div class="col-3 mb-3">
                                <form action="" method="get">
                                    <div class="input-group">
                                        <input type="text" name="keyword" class="form-control" placeholder="Masukkan keyword pencarian.." value="<?= (isset($keyword) ? $keyword : '') ?>" aria-label="Masukkan keyword pencarian.." aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="submit" name="submit" class="btn btn-sm btn-success">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Fakultas</th>
                                            <th>Nama Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                        <?php foreach ($prodi as $p) :  ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $p->fakultas['nama_fakultas']; ?></td>
                                                <td><?= $p->nama_prodi; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/menus/prodi/edit/' . $p->id); ?>" class="btn btn-warning"><i class="mdi mdi-pencil text-center"></i></a>
                                                    <a href="<?= base_url('admin/menus/prodi/delete/' . $p->id); ?>" class="btn btn-danger"><i class="mdi mdi-delete text-center"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('prodi', 'default_bootstrap') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endSection(); ?>