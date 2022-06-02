<?= $this->extend('layout/app') ?>
<?= $this->section('title') ?>
Services
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="backdrop"></div>
<?php include_once('includes/web-header.php') ?>
<?php if (session()->getFlashdata('success')) { ?>
<div class="alert alert-success">
    <?php echo session()->getFlashdata('success'); ?>
</div>
<?php } ?>

<div class="row d-flex justify-content-center my-5">
    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h1>Thank you</h1>
                <p>
                    Vendor will approve your order check your email
                    for invoice
                </p>
                <a href="/">
                    <button class="btn btn-success">Back To Home</button>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include_once('includes/web-footer.php') ?>
<?= $this->endSection() ?>
