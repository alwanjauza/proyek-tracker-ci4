<ul class="nav">
    <li class="nav-item nav-category">
        <span class="nav-link">Project</span>
    </li>
    <li class="nav-item menu-items">
        <a
            class="nav-link"
            data-toggle="collapse"
            href="#pembuatan"
            aria-expanded="false"
            aria-controls="pembuatan">
            <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Pengembangan</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pembuatan">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('project/new-project'); ?>">Ajukan Pengembangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('project/data'); ?>">List Ajuan</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item menu-items">
        <a
            class="nav-link"
            data-toggle="collapse"
            href="#pengembangan"
            aria-expanded="false"
            aria-controls="pengembangan">
            <span class="menu-icon">
                <i class="mdi mdi-monitor"></i>
            </span>
            <span class="menu-title">Pembuatan</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pengembangan">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('project/new-pembuatan'); ?>">Ajukan Pembuatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('project/list-pembuatan'); ?>">List Ajuan</a>
                </li>
            </ul>
        </div>
    </li>

    <?php if (in_groups('admin')) : ?>
        <li class="nav-item nav-category">
            <span class="nav-link">User Management</span>
        </li>
        <li class="nav-item menu-items">
            <a
                class="nav-link"
                data-toggle="collapse"
                href="#auth"
                aria-expanded="false"
                aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-account-multiple"></i>
                </span>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/user/new-user'); ?>">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/user/list'); ?>">List User</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Other Menus</span>
        </li>
        <li class="nav-item menu-items">
            <a
                class="nav-link"
                data-toggle="collapse"
                href="#menus"
                aria-expanded="false"
                aria-controls="menus">
                <span class="menu-icon">
                    <i class="mdi mdi-view-dashboard"></i>
                </span>
                <span class="menu-title">Feature</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menus">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/menus/fakultas'); ?>">Fakultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/menus/prodi'); ?>">Prodi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/menus/bagian'); ?>">Bagian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/menus/jenis'); ?>">Jenis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/menus/tim'); ?>">Tim</a>
                    </li>
                </ul>
            </div>
        </li>
    <?php endif; ?>

</ul>