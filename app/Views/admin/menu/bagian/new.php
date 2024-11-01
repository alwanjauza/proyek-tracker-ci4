<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Bagian Baru </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bagian Baru</h4>

                        <form class="forms-sample" action="/admin/menus/bagian/create" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_bagian">Nama Bagian</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['nama_bagian'] ?? '') ? 'is-invalid' : '' ?>" id="nama_bagian" name="nama_bagian" value="<?= old('nama_bagian') ?>" placeholder="Nama Bagian">
                                <?php if (isset(session()->getFlashdata('errors')['nama_bagian'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nama_bagian'] ?>
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