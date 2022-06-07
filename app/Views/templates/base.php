<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Codeigniter4 - Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/fontawesome/css/all.min.css'); ?>">

    <!-- Plugins -->
    <link rel="stylesheet" href="<?= base_url('vendor/datatables/datatables.min.css'); ?>" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <?= $this->include('templates/navbar'); ?>
        <?= $this->include('templates/sidebar'); ?>

        <?= $this->renderSection('content'); ?>
        
        <?= $this->include('templates/footer'); ?>
      </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/popper/popper.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/nicescroll/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?= base_url('vendor/moment/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/stisla.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.js'); ?>"></script>
    
    <!-- Plugins -->
    <?= $this->renderSection('extrascript'); ?>

    <!-- Page Specific JS File -->
    
    <!-- Template JS File -->
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
  </body>
  </html>

<!-- @author rafikbojes -->