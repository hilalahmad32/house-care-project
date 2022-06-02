<?= $this->extend('layout/app') ?>
<?= $this->section('title') ?>
Services
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="backdrop"></div>
<?php include_once('includes/web-header.php')
?>
<?php if (session()->getFlashdata('success')) { ?>
<div class="alert alert-success">
    <?php echo session()->getFlashdata('success'); ?>
</div>
<?php } else { ?>
<div class="alert alert-danger">
    <?php echo session()->getFlashdata('error'); ?>
</div>
<?php } ?>
<section class=" newitem-part" style="padding-top: 20px;padding-bottom: 20px">
    <div class="container">
        <h1 style="margin:20px 0px">Services</h1>
        <div class=" row">
            <?php
            foreach ($services as $services) {
            ?>
            <div class="col-xl-4 col-lg-4 col-md-6 my-2">
                <div class="card" style="width: 100%;">
                    <a href="/services/packages/<?= $services['service_id'] ?>">
                        <img src="<?= base_url('admins/uploads/' . $services['image']) ?>"
                            style="width:100%;height:40vh;object-fit:cover;" alt="">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $services['service_name'] ?></h5>
                        <a href="/services/packages/<?= $services['service_id'] ?>">
                            Packages
                        </a>
                    </div>
                </div>
            </div>

            <?php }
            ?>
        </div>
    </div>
</section>
<section class="news-part" style="background: url(images/newsletter.jpg) no-repeat center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 col-xl-7">
                <div class="news-text">
                    <h2>Get 20% Discount for Subscriber</h2>
                    <p>Lorem ipsum dolor consectetur adipisicing accusantium</p>
                </div>
            </div>
            <div class="col-md-7 col-lg-6 col-xl-5">
                <form class="news-form"><input type="text" placeholder="Enter Your Email Address"><button><span><i
                                class="icofont-ui-email"></i>Subscribe</span></button></form>
            </div>
        </div>
    </div>
</section>
<?php include_once('includes/web-footer.php')
?>

<?= $this->endSection() ?>
