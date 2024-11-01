<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tim Baru </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tim Baru</h4>
                        <form class="forms-sample" action="/admin/menus/tim/create" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_tim">Nama Tim</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['nama_tim'] ?? '') ? 'is-invalid' : '' ?>" id="nama_tim" name="nama_tim" placeholder="Nama Tim">
                                <?php if (isset(session()->getFlashdata('errors')['nama_tim'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nama_tim'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="anggota_tim[]">Anggota</label>
                                <select name="anggota_tim[]" id="anggota_tim[]" class="form-control js-example-basic-multiple" multiple="multiple" style="width:100%">
                                    <?php foreach ($users as $user) : ?>
                                        <option value="<?= $user->id ?>"><?= $user->username ?> (<?= $user->fullname ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="button" class="btn btn-dark" onclick="window.history.back()">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>