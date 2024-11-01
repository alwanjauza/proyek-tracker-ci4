<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Ajuan Pengembangan Aplikasi </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ajuan Pengembangan Aplikasi</h4>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <blockquote class="blockquote blockquote-danger">
                                <p class="mb-0"><?= session()->getFlashdata('error') ?></p>
                            </blockquote>
                        <?php endif; ?>
                        <form class="forms-sample" action="/project/create" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_aplikasi">Nama Aplikasi</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['nama_aplikasi'] ?? '') ? 'is-invalid' : '' ?>" id="nama_aplikasi" name="nama_aplikasi" placeholder="Nama Aplikasi">
                                <?php if (isset(session()->getFlashdata('errors')['nama_aplikasi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nama_aplikasi'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="id_bagian">Bagian</label>
                                <select class="form-control <?= (session()->getFlashdata('errors')['id_bagian'] ?? '') ? 'is-invalid' : '' ?>" id="id_bagian" name="id_bagian">
                                    <?php foreach ($bagian as $b) : ?>
                                        <option value="<?= $b['id_bagian']; ?>"><?= $b['nama_bagian']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset(session()->getFlashdata('errors')['id_bagian'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['id_bagian'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="id_jenis_app">Jenis Aplikasi</label>
                                <select class="form-control <?= (session()->getFlashdata('errors')['id_jenis_app'] ?? '') ? 'is-invalid' : '' ?>" id="id_jenis_app" name="id_jenis_app">
                                    <?php foreach ($jenisApp as $jenis) : ?>
                                        <option value="<?= $jenis['id_jenis_app']; ?>"><?= $jenis['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset(session()->getFlashdata('errors')['id_jenis_app'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['id_jenis_app'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="fungsi">Fungsi</label>
                                <input type="text" class="form-control" id="fungsi" name="fungsi" placeholder="Fungsi">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi"></textarea>
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