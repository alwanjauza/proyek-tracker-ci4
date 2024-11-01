<?php $this->extend('templates/index'); ?>

<?php $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Daftar Bagian </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="page-header">
                            <h4 class="card-title">Daftar Bagian</h4>
                            <button type="button" class="btn btn-inverse-success btn-fw" onclick="window.location.href='<?= base_url('admin/menus/new-bagian'); ?>'"><i class="mdi mdi-plus"></i></button>
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
                                            <th>Nama Bagian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                        <?php foreach ($bagian as $b) :  ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $b->nama_bagian; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/menus/bagian/edit/' . $b->id_bagian); ?>" class="btn btn-warning"><i class="mdi mdi-pencil text-center"></i></a>
                                                    <a href="<?= base_url('admin/menus/bagian/delete/' . $b->id_bagian); ?>" class="btn btn-danger"><i class="mdi mdi-delete text-center"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('master_bagian', 'default_bootstrap') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endSection(); ?>