<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Ajuan </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Ajuan</h4>
                        <form class="forms-sample" action="/project/update-pembuatan/<?= $ajuan->id_ajuan; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="id_bagian">Bagian</label>
                                <select class="form-control <?= (session()->getFlashdata('errors')['id_bagian'] ?? '') ? 'is-invalid' : '' ?>" id="id_bagian" name="id_bagian">
                                    <?php foreach ($bagian as $b) : ?>
                                        <option value="<?= $b['id_bagian']; ?>" <?= ($b['id_bagian'] == $ajuan->id_bagian) ? 'selected' : ''; ?>>
                                            <?= $b['nama_bagian']; ?>
                                        </option>
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
                                        <option value="<?= $jenis['id_jenis_app']; ?>" <?= ($jenis['id_jenis_app'] == $ajuan->id_jenis_app) ? 'selected' : ''; ?>>
                                            <?= $jenis['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset(session()->getFlashdata('errors')['id_jenis_app'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['id_jenis_app'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (in_groups('admin')) : ?>
                                <div class="form-group">
                                    <label for="id_tim">Tim IT</label>
                                    <select class="form-control" id="id_tim" name="id_tim">
                                        <?php foreach ($tim as $t) : ?>
                                            <option value="<?= $t['id_tim']; ?>" <?= ($t['id_tim'] == $ajuan->id_tim) ? 'selected' : ''; ?>>
                                                <?= $t['nama_tim']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="fungsi">Fungsi</label>
                                <input type="text" class="form-control" id="fungsi" name="fungsi" placeholder="Fungsi" value="<?= old('fungsi', $ajuan->fungsi); ?>">
                            </div>
                            <div class="form-group">
                                <label for="waktu_kerja">Waktu Pengerjaan (Hari)</label>
                                <div class="input-group">
                                    <input type="text" pattern="[0-9]*" inputmode="numeric" name="waktu_kerja" id="waktu_kerja" class="form-control  <?= (session()->getFlashdata('errors')['waktu_kerja'] ?? '') ? 'is-invalid' : '' ?>" placeholder="Waktu Kerja (Dalam Bentuk Hari)" aria-label="Username" aria-describedby="basic-addon1" value="<?= old('fungsi', $ajuan->waktu_kerja); ?>">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Hari</span>
                                    </div>
                                    <?php if (isset(session()->getFlashdata('errors')['waktu_kerja'])) : ?>
                                        <div class="invalid-feedback">
                                            <?= session()->getFlashdata('errors')['waktu_kerja'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file-upload">File Upload</label>
                                <input type="file" name="file" id="file-upload" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info"
                                        value="<?= old('file_path', isset($ajuan->file_path) ? basename($ajuan->file_path) : ''); ?>"
                                        disabled placeholder="Upload File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Browse</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi"><?= old('deskripsi', $ajuan->deskripsi); ?></textarea>
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