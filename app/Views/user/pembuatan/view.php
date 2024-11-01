<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> View Ajuan Pembuatan </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Ajuan Pembuatan</h4>
                        <form class="forms-sample">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="id_bagian">Bagian</label>
                                <select class="form-control" id="id_bagian" name="id_bagian" disabled>
                                    <?php foreach ($bagian as $b) : ?>
                                        <option value="<?= $b['id_bagian']; ?>" <?= ($b['id_bagian'] == $ajuan->id_bagian) ? 'selected' : ''; ?>>
                                            <?= $b['nama_bagian']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_jenis_app">Jenis Aplikasi</label>
                                <select class="form-control" id="id_jenis_app" name="id_jenis_app" disabled>
                                    <?php foreach ($jenisApp as $jenis) : ?>
                                        <option value="<?= $jenis['id_jenis_app']; ?>" <?= ($jenis['id_jenis_app'] == $ajuan->id_jenis_app) ? 'selected' : ''; ?>>
                                            <?= $jenis['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tim">Tim IT</label>
                                <select class="form-control" id="id_tim" name="id_tim" disabled>
                                    <?php foreach ($tim as $t) : ?>
                                        <option value="<?= $t['id_tim']; ?>" <?= ($t['id_tim'] == $ajuan->id_tim) ? 'selected' : ''; ?>>
                                            <?= $t['nama_tim']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fungsi">Fungsi</label>
                                <input type="text" class="form-control" id="fungsi" name="fungsi" placeholder="Fungsi" value="<?= old('fungsi', $ajuan->fungsi); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="waktu_kerja">Waktu Pengerjaan (Hari)</label>
                                <div class="input-group">
                                    <input type="text" disabled pattern="[0-9]*" inputmode="numeric" name="waktu_kerja" id="waktu_kerja" class="form-control  <?= (session()->getFlashdata('errors')['waktu_kerja'] ?? '') ? 'is-invalid' : '' ?>" placeholder="Waktu Kerja (Dalam Bentuk Hari)" aria-label="Username" aria-describedby="basic-addon1" value="<?= old('fungsi', $ajuan->waktu_kerja); ?>">
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
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi" disabled><?= old('deskripsi', $ajuan->deskripsi); ?></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">History Ajuan</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahap</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($history as $h) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $h['tahap']; ?></td>
                                            <td>
                                                <?= (new DateTime($h['tanggal_mulai']))->setTimezone(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d H:i:s'); ?>
                                            </td>
                                            <td>
                                                <?= (new DateTime($h['tanggal_selesai']))->setTimezone(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d H:i:s'); ?>
                                            </td>
                                            <td><?= $h['keterangan']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>