<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Validasi Ajuan </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Validasi Ajuan</h4>

                        <!-- Form Validasi Ajuan -->
                        <form id="validateForm" action="<?= site_url('/project/validate/' . $ajuan['id_ajuan']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" id="action" name="action" value="">

                            <div class="form-group">
                                <label for="nama_aplikasi">Nama Aplikasi</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['nama_aplikasi'] ?? '') ? 'is-invalid' : '' ?>" id="nama_aplikasi" name="nama_aplikasi" value="<?= $ajuan['nama_aplikasi']; ?>" disabled>
                                <?php if (isset(session()->getFlashdata('errors')['nama_aplikasi'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nama_aplikasi'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="id_bagian">Bagian</label>
                                <select class="form-control <?= (session()->getFlashdata('errors')['id_bagian'] ?? '') ? 'is-invalid' : '' ?>" id="id_bagian" name="id_bagian" disabled>
                                    <?php foreach ($bagian as $b) : ?>
                                        <option value="<?= $b['id_bagian']; ?>" <?= $ajuan['id_bagian'] == $b['id_bagian'] ? 'selected' : ''; ?>><?= $b['nama_bagian']; ?></option>
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
                                <select class="form-control <?= (session()->getFlashdata('errors')['id_jenis_app'] ?? '') ? 'is-invalid' : '' ?>" id="id_jenis_app" name="id_jenis_app" disabled>
                                    <?php foreach ($jenisApp as $jenis) : ?>
                                        <option value="<?= $jenis['id_jenis_app']; ?>" <?= $ajuan['id_jenis_app'] == $jenis['id_jenis_app'] ? 'selected' : ''; ?>><?= $jenis['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset(session()->getFlashdata('errors')['id_jenis_app'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['id_jenis_app'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="id_tim">Tim</label>
                                <select class="form-control" id="id_tim" name="id_tim"
                                    <?= ($ajuan['tahap_saat_ini'] != 'validasi_tim_it') ? 'disabled' : ''; ?>>
                                    <?php foreach ($tim as $t) : ?>
                                        <option value="<?= $t['id_tim']; ?>" <?= $ajuan['id_tim'] == $t['id_tim'] ? 'selected' : ''; ?>><?= $t['nama_tim']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fungsi">Fungsi</label>
                                <input type="text" class="form-control" id="fungsi" name="fungsi" value="<?= $ajuan['fungsi']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" disabled><?= $ajuan['deskripsi']; ?></textarea>
                            </div>

                            <?php if ($ajuan['status'] !== 'Done') : ?>
                                <button type="button" class="btn btn-success mr-2" onclick="submitForm('approve')">Approve</button>
                                <button type="button" class="btn btn-danger mr-2" onclick="submitForm('reject')">Reject</button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-dark" onclick="window.history.back()">Cancel</button>
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

<script>
    function submitForm(actionType) {
        document.getElementById('action').value = actionType;
        document.getElementById('validateForm').submit();
    }
</script>

<?= $this->endSection(); ?>