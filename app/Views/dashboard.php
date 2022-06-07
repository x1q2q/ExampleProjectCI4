<?= $this->extend('templates/base'); ?>

<?= $this->section('content'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">This is Dashboard</h2>
    </div>
    </section>
</div>
<?= $this->endSection('content'); ?>