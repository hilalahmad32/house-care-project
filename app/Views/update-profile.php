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
            <div class="card " style="padding: 30px;">
                <form class="user-form" method="post">
                    <div class="form-group"><input name='name' value='<?= $users['name'] ?>' type="text"
                            class="form-control" placeholder="Enter your Name">
                    </div>
                    <div class="form-group"><input name='id' value='<?= $users['user_id'] ?>' type="hidden"
                            class="form-control" placeholder="Enter your Name">
                    </div>
                    <div class="form-group"><input name="phone" value='<?= $users['phone'] ?>' type="text"
                            class="form-control" placeholder="Enter your Phone">
                    </div>
                    <div class="form-group"><input name="city" value='<?= $users['city'] ?>' type="text"
                            class="form-control" placeholder="Enter your City">
                    </div>
                    <div class="form-group"><input name="state" value='<?= $users['state'] ?>' type="text"
                            class="form-control" placeholder="Enter your State">
                    </div>
                    <div class="form-group"><input name="address" value='<?= $users['address'] ?>' type="text"
                            class="form-control" placeholder="Enter your Address"></div>
                    <div class="form-group"><input name="email" value='<?= $users['email'] ?>' type="email"
                            class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-button">
                        <button type="submit" class="btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/web-footer.php'; ?>
<?= $this->endSection() ?>
