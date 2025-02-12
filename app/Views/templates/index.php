<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= isset($title) ? $title : 'Project'; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/amikom.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="<?= base_url('/project/data'); ?>"><img src="<?= base_url(); ?>assets/images/amikom.svg" style="display: block;height: 120px" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="<?= base_url('/project/data'); ?>"><img src="<?= base_url(); ?>assets/images/amikom.svg" style="display: block;height: 3em" alt="logo" /></a>
            </div>
            <?= $this->include('templates/sidebar'); ?>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <?= $this->include('templates/topbar'); ?>
            <!-- partial -->
            <?= $this->renderSection('main-panel'); ?>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?= base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url(); ?>assets/js/misc.js"></script>
    <script src="<?= base_url(); ?>assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url(); ?>assets/vendors/select2/select2.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url(); ?>assets/js/file-upload.js"></script>
    <script src="<?= base_url(); ?>assets/js/typeahead.js"></script>
    <script src="<?= base_url(); ?>assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

</html>