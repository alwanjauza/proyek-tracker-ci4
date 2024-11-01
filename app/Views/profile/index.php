<?= $this->extend('templates/index'); ?>

<?= $this->section('main-panel'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Profile </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>

                        <form class="forms-sample" action="/profile/update" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $user->id; ?>">

                            <div class="form-group">
                                <label for="no_identitas">Nomor Identitas</label>
                                <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control <?= (session()->getFlashdata('errors')['no_identitas'] ?? '') ? 'is-invalid' : '' ?>" id="no_identitas" name="no_identitas" value="<?= old('no_identitas', $user->no_identitas) ?>" placeholder="Nomor Identitas">
                                <?php if (isset(session()->getFlashdata('errors')['no_identitas'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['no_identitas'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['fullname'] ?? '') ? 'is-invalid' : '' ?>" id="fullname" name="fullname" value="<?= old('fullname', $user->fullname) ?>" placeholder="Full Name">
                                <?php if (isset(session()->getFlashdata('errors')['fullname'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['fullname'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control <?= (session()->getFlashdata('errors')['username'] ?? '') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username', $user->username) ?>" placeholder="Username">
                                <?php if (isset(session()->getFlashdata('errors')['username'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['username'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?= (session()->getFlashdata('errors')['email'] ?? '') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email', $user->email) ?>" placeholder="Email">
                                <?php if (isset(session()->getFlashdata('errors')['email'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="id_fakultas">Fakultas</label>
                                <select name="id_fakultas" id="id_fakultas" class="form-control">
                                    <?php foreach ($fakultas as $f) : ?>
                                        <option value="<?= $f->id ?>" <?= ($f->id == old('id_fakultas', $user->id_fakultas)) ? 'selected' : '' ?>>
                                            <?= $f->nama_fakultas ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_prodi">Program Studi</label>
                                <select name="id_prodi" id="id_prodi" class="form-control">
                                    <option value="">Pilih Program Studi</option>
                                    <?php foreach ($prodi as $p) : ?>
                                        <option value="<?= $p->id ?>" data-id_fakultas="<?= $p->id_fakultas ?>" <?= ($p->id == old('id_prodi', $user->id_prodi)) ? 'selected' : '' ?>>
                                            <?= $p->nama_prodi ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control <?= (session()->getFlashdata('errors')['password'] ?? '') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="New Password (leave blank to keep current)">
                                <?php if (isset(session()->getFlashdata('errors')['password'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['password'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button type="button" class="btn btn-dark" onclick="window.history.back()">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fakultasSelect = document.getElementById('id_fakultas');
        const prodiSelect = document.getElementById('id_prodi');
        const allProdiOptions = prodiSelect.querySelectorAll('option[data-id_fakultas]');

        const selectedProdi = prodiSelect.value;
        const selectedFakultas = fakultasSelect.value;

        function filterProdiOptions(fakultasId) {
            allProdiOptions.forEach(option => {
                if (option.getAttribute('data-id_fakultas') === fakultasId) {
                    option.style.display = '';
                    if (option.value == selectedProdi) {
                        option.selected = true;
                    }
                } else {
                    option.style.display = 'none';
                }
            });
        }

        fakultasSelect.addEventListener('change', function() {
            const selectedFakultas = this.value;
            prodiSelect.value = '';
            filterProdiOptions(selectedFakultas);
        });

        filterProdiOptions(selectedFakultas);
    });
</script>

<?= $this->endSection(); ?>