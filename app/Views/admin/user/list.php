<?php $this->extend('templates/index'); ?>

<?php $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> User List </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User List</h4>
                        </p>
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + ($itemsPerPage * ($currentPage - 1)); ?>
                                    <?php foreach ($users as $user) :  ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $user->username; ?></td>
                                            <td><?= $user->email; ?></td>
                                            <td><?= $user->name; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/user/edit/' . $user->userId); ?>" class="btn btn-warning"><i class="mdi mdi-pencil text-center"></i></a>
                                                <a href="<?= base_url('admin/delete/' . $user->userId); ?>" class="btn btn-danger"><i class="mdi mdi-delete text-center"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <!-- Tampilkan pagination links -->
                            <?= $pager->makeLinks($currentPage, $itemsPerPage, $totalUsers, 'default_bootstrap') ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>