<?= $this->extend('layout/app') ?>
<?= $this->section('title') ?>
Services
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="backdrop"></div>
<?php include('includes/web-header.php') ?>
<?php if (session()->getFlashdata('success')) { ?>
<div class="alert alert-success">
    <?php echo session()->getFlashdata('success'); ?>
</div>
<?php } ?>
<div class="container my-5  ">
    <div class="row bg-white py-4">
        <div class="col-xl-4 col-md-4 col-sm-12">
            <?php include('includes/profile.php') ?>
        </div>
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?=
                                $cart_data;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 offset-6">
                    <?= $summary ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/web-footer.php') ?>
<?= $this->endSection() ?>
