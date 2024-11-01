<?php $this->extend('templates/index'); ?>

<?php $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> List Pembuatan Aplikasi </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="page-header">
                            <h4 class="card-title">List Pembuatan Aplikasi</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pengaju</th>
                                        <th>Jenis</th>
                                        <th>Nama Tim</th>
                                        <th>Waktu Kerja</th>
                                        <th>Persentase</th>
                                        <th>Status</th>
                                        <?php if (in_groups('admin') || in_groups('user')) : ?>
                                            <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($project as $p) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $p->fullname; ?></td>
                                            <td><?= $p->jenis_app_name; ?></td>
                                            <td><?= $p->nama_tim; ?></td>
                                            <td><?= $p->waktu_kerja; ?> Hari</td>
                                            <td>
                                                <?php
                                                $progress = $p->percentage;
                                                $progressClass = '';

                                                if ($progress < 30) {
                                                    $progressClass = 'bg-danger';
                                                } elseif ($progress < 70) {
                                                    $progressClass = 'bg-warning';
                                                } else {
                                                    $progressClass = 'bg-success';
                                                }
                                                ?>
                                                <div class="progress">
                                                    <div class="progress-bar <?= $progressClass ?>" role="progressbar" style="width: <?= $progress ?>%" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if ($p->status == 'on_review') : ?>
                                                    <span class="badge badge-warning">On Review</span>
                                                <?php elseif ($p->status == 'rejected') : ?>
                                                    <span class="badge badge-danger">Rejected</span>
                                                <?php elseif ($p->status == 'Done') : ?>
                                                    <span class="badge badge-success">Done</span>
                                                <?php endif; ?>
                                            </td>
                                            <?php if (in_groups('admin')) : ?>
                                                <td>
                                                    <a href="<?= base_url('project/validate-pembuatan/' . $p->id_ajuan); ?>" class="btn btn-success"><i class="mdi mdi-eye"></i></a>
                                                    <a href="<?= base_url('project/edit-pembuatan/' . $p->id_ajuan); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="<?= base_url('project/delete-pembuatan/' . $p->id_ajuan); ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                            <?php elseif (in_groups('user')) : ?>
                                                <td>
                                                    <a href="<?= base_url('project/view-pembuatan/' . $p->id_ajuan); ?>" class="btn btn-success"><i class="mdi mdi-eye"></i></a>
                                                    <?php if ($p->status == 'rejected' && $p->id_user == user_id()) : ?>
                                                        <a href="<?= base_url('project/edit-pembuatan/' . $p->id_ajuan); ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endSection(); ?>