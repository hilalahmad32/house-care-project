<?= $this->extend('layout/app') ?>
<?= $this->section('title') ?>
packages
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
        <div class="row d-flex align-items-center">
            <div class="col-xl-3 col-md-4 col-sm-12">
                <h3 class="text-center" style="margin:20px 0px"><?= $s_name   ?></h3>

            </div>
            <div class="col-xl-9 col-md-8 col-sm-12">
                <div class="my-slider text-center">
                    <?php
                    $gallery = new \App\Models\PackagesGallery;
                    $gallerys = $gallery->where('sr_id', $s_id)->findAll();
                    foreach ($gallerys as $gall) {
                    ?>
                    <div>
                        <img src="<?= base_url('admins/uploads/gallery/' . $gall['images']) ?>"
                            style="width: 100%; padding:10px;" alt="">
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class=" row">
            <?php
            foreach ($packages as $package) {
            ?>
            <div class="col-xl-4 col-lg-4 col-md-6 my-2">
                <div class="card" style="width: 100%;">
                    <img src="<?= base_url('admins/uploads/' . $package['image']) ?>"
                        style="width:100%;height:50vh;object-fit:cover;" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $package['title'] ?></h5>
                        <span>Price : $<?= $package['price'] ?></span>

                        <p class="card-text"> <?= $package['description'] ?></p>
                        <?php
                            if (session()->get('user_id')) {

                            ?>
                        <a style="padding:5px 30px; background-color:yellow;"
                            href="/addtocart/<?= $package['pack_id'] ?>/services/<?= $package['service_id'] ?>">
                            Add
                        </a>
                        <?php
                            } else {
                            ?>
                        <a style="padding:5px 30px; background-color:yellow;" data-bs-toggle="modal"
                            data-bs-target="#product-view">
                            Add
                        </a>
                        <?php

                            }
                            ?>
                    </div>
                </div>
            </div>

            <?php }
            ?>
        </div>
    </div>
</section>
<hr>
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-md-8 col-sm-12">
            <?php
            foreach ($reviews as $review) {
            ?>
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <img style="width:100px;border-radius: 100%;"
                        src="https://res.cloudinary.com/urbanclap/image/upload/t_high_res_template,q_auto:low,f_auto/images/supply/customer-app-supply/1640239725633-779eb5.png"
                        alt="">

                    <div class="card-title ml-4" style="margin-left: 10px;">
                        <h3><?= $review['name'] ?></h3>
                        <h5>rating <?= $review['rating'] ?></h5>
                        <?php
                            if ($review['rating'] == 1) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 1.5) {
                            ?>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 2) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 2.5) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 3) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 3.5) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 4) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 4.5) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <?php
                            } elseif ($review['rating'] == 5) {
                            ?>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card">
                <form action="" method="post">
                    <div class="card-body d-flex  flex-column">
                        <select name="rating" id="" class="form-control">
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                            <option value="3.5">3.5</option>
                            <option value="4">4</option>
                            <option value="4.5">4.5</option>
                            <option value="5">5</option>
                        </select>
                        <button class="btn btn-success" style="margin-top: 10px;" type="submit">Review</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
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
