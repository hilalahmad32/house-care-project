<?= $this->extend('layout/app') ?>
<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="backdrop"></div>

<?php include_once('includes/web-header.php');

?>
<section class="brand-part" style="margin-bottom: 30px;margin-top: 30px">
    <div class="container">
        <div class="brand-slider slider-arrow">
            <?php foreach ($categorys as $category) { ?>

            <div class="brand-wrap" style="height:25vh;">
                <div class=" brand-media">
                    <a href="/packages/services/<?= $category['category_id'] ?>"></a>
                    <img src="<?php echo base_url() ?>/admins/uploads/<?= $category['icons'] ?>" alt="brand">
                    <div class="brand-overlay"><a href="Services/manpower"><i class="fas fa-link"></i></a></div>
                </div>
                <div class="brand-meta">
                    <a href="/categorys/services/<?= $category['category_id'] ?>"><?= $category['category_name'] ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="home-index-slider slider-arrow slider-dots">
    <?php
    foreach ($banners as $banner) {
    ?>
    <div class="banner-part banner-1" style="
    padding: 50px 0px 60px;
    margin-bottom: 25px;
    /* position: relative; */
    /* z-index: 1; */
    background: url(<?= base_url('admins/uploads/' . $banner['image']); ?>);
    width: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover
    ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="banner-content" style="color:white;">
                        <h1 style="color:white;"><?php echo $banner['title'] ?></h1>
                        <p> <?php echo $banner['content'] ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>


</section>
<?php

use App\Models\Services;

$category = new app\Models\Category();
$categorys = $category->findAll();
$service = new Services();


foreach ($categorys as $cat) {
    $services = $service->where('cat_id', $cat['category_id'])->findAll();
?>
<section class=" newitem-part" style="padding-top: 20px;padding-bottom: 20px">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading">
                    <h3 class="head12">
                        <?php echo $cat['category_name'] ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="new-slider slider-arrow">

                    <?php
                        foreach ($services as $ser) {
                        ?>
                    <li>
                        <div class="product-card">
                            <div class="product-media">

                                <a class="product-image" href="/services/packages/<?= $ser['service_id'] ?>"
                                    style="width:100%;"><img
                                        src="<?php echo base_url('admins/uploads/' . $ser['image']); ?>"
                                        style="width: 100%;height:150px; object-fit:cover;"
                                        alt="<?php echo $ser['service_name']; ?>"></a>

                            </div>
                            <div class="product-content mb-0">
                                <h6 class="product-name"><a href="/services/packages/<?= $ser['service_id'] ?>">
                                        <?php echo $ser['service_name'] ?></a>
                                </h6>
                            </div>
                        </div>
                    </li>
                    <?php

                        }
                        ?>
                </ul>
            </div>
        </div>

    </div>
</section>
<?php
}



?>


<div class="section promo-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img"><a href="product.php"><img src="images/promo/home/01.jpg" alt="promo"></a></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img"><a href="product.php"><img src="images/promo/home/02.jpg" alt="promo"></a></div>
            </div>
        </div>
    </div>
</div>


<section class="section testimonial-part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>client's feedback</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-slider slider-arrow">
                    <div class="testimonial-card">
                        <i class="fas fa-quote-left"></i>
                        <p>Lorem ipsum dolor consectetur adipisicing elit neque earum sapiente vitae obcaecati magnam
                            doloribus magni provident ipsam</p>
                        <h5>mahmud hasan</h5>
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <img src="images/avatar/01.jpg" alt="testimonial">
                    </div>
                    <div class="testimonial-card">
                        <i class="fas fa-quote-left"></i>
                        <p>Lorem ipsum dolor consectetur adipisicing elit neque earum sapiente vitae obcaecati magnam
                            doloribus magni provident ipsam</p>
                        <h5>mahmud hasan</h5>
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <img src="images/avatar/02.jpg" alt="testimonial">
                    </div>
                    <div class="testimonial-card">
                        <i class="fas fa-quote-left"></i>
                        <p>Lorem ipsum dolor consectetur adipisicing elit neque earum sapiente vitae obcaecati magnam
                            doloribus magni provident ipsam</p>
                        <h5>mahmud hasan</h5>
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <img src="images/avatar/03.jpg" alt="testimonial">
                    </div>
                    <div class="testimonial-card">
                        <i class="fas fa-quote-left"></i>
                        <p>Lorem ipsum dolor consectetur adipisicing elit neque earum sapiente vitae obcaecati magnam
                            doloribus magni provident ipsam</p>
                        <h5>mahmud hasan</h5>
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <img src="images/avatar/04.jpg" alt="testimonial">
                    </div>
                </div>
            </div>
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
<!--  <section class="intro-part">
         <div class="container">
            <div class="row intro-content">
               <div class="col-sm-6 col-lg-3">
                  <div class="intro-wrap">
                     <div class="intro-icon"><i class="fas fa-truck"></i></div>
                     <div class="intro-content">
                        <h5>free home delivery</h5>
                        <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-3">
                  <div class="intro-wrap">
                     <div class="intro-icon"><i class="fas fa-sync-alt"></i></div>
                     <div class="intro-content">
                        <h5>instant return policy</h5>
                        <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-3">
                  <div class="intro-wrap">
                     <div class="intro-icon"><i class="fas fa-headset"></i></div>
                     <div class="intro-content">
                        <h5>quick support system</h5>
                        <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-3">
                  <div class="intro-wrap">
                     <div class="intro-icon"><i class="fas fa-lock"></i></div>
                     <div class="intro-content">
                        <h5>secure payment way</h5>
                        <p>Lorem ipsum dolor sit amet adipisicing elit nobis.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
<?php include_once('includes/web-footer.php')
?>

<?= $this->endSection() ?>
