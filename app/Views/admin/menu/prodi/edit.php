<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Prodi </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Prodi</h4>
                        <form class="forms-sample" action="/admin/menus/prodi/update/<?= $prodi->id ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="id_fakultas">Fakultas</label>
                                <select name="id_fakultas" id="id_fakultas" class="form-control">
                                    <?php foreach ($fakultas as $f) : ?>
                                        <option value="<?= $f->id ?>" <?= ($f->id == $prodi->id_fakultas) ? 'selected' : '' ?>>
                                            <?= $f->nama_fakultas ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_prodi">Nama Prodi</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['nama_prodi'] ?? '') ? 'is-invalid' : '' ?>" id="nama_prodi" name="nama_prodi" placeholder="Nama Prodi" value="<?= $prodi->nama_prodi; ?>">
                                <?php if (isset(session()->getFlashdata('errors')['nama_prodi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nama_prodi'] ?>
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