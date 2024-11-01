<?php $this->extend('templates/index'); ?>

<?php $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit User </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4>
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('errors')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="/admin/user/update/<?= $user->userId; ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user->fullname; ?>" placeholder="Fullname">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?>" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user->email; ?>" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option value=1 <?= $user->name == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                    <option value=2 <?= $user->name == 'user' ? 'selected' : ''; ?>>User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-dark" onclick="window.history.back()">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>