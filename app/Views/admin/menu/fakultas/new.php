<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Fakultas Baru </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Fakultas Baru</h4>
                        <form class="forms-sample" action="/admin/menus/fakultas/create" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_fakultas">Nama Fakultas</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['nama_fakultas'] ?? '') ? 'is-invalid' : '' ?>" id="nama_fakultas" name="nama_fakultas" placeholder="Nama Fakultas">
                                <?php if (isset(session()->getFlashdata('errors')['nama_fakultas'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nama_fakultas'] ?>
                                    </div>
                                <?php endif; ?>
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
<?= $this->endSection(); ?>