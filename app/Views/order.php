<?= $this->extend('layout/app') ?>
<?= $this->section('title') ?>
Orders
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php include_once('includes/web-header.php') ?>
<div class="container" style="margin: 20px 0px">
    <div class="card " style="padding: 30px;">
        <form class="user-form" method="post" action="">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">Payment Method</label>
                        <select name="payment_method" id="" class="form-control">
                            <option readonly selected>Select your Payment Method</option>
                            <option value="1">PayPal</option>
                            <option value="2">Google Pay</option>
                            <option value="3">Cash on Dilvery</option>
                        </select>
                    </div>

                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input readonly name='name' value="<?= $user['name'] ?>" type="text" class="form-control"
                            placeholder="Enter your Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input readonly name="phone" value="<?= $user['phone'] ?>" type="text" class="form-control"
                            placeholder="Enter your Phone">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">City</label>
                        <input readonly name="city" value="<?= $user['city'] ?>" type="text" class="form-control"
                            placeholder="Enter your City">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">State</label>
                        <input readonly name="state" value="<?= $user['state'] ?>" type="text" class="form-control"
                            placeholder="Enter your State">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">

                    <div class="form-group">
                        <label for="">Address</label>
                        <input readonly name="address" value="<?= $user['address'] ?>" type="text" class="form-control"
                            placeholder="Enter your Address">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input readonly name="email" value="<?= $user['email'] ?>" type="email" class="form-control"
                            placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input readonly name="qty" value="<?= $cart[0]['sum(qty)'] ?>" type="text" class="form-control"
                            placeholder="Enter your Qty">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="">Total Price</label>
                        <input readonly name="total_price" value="<?= $cart[0]['sum(total_price)'] ?>" type="text"
                            class="form-control" placeholder="Enter your Price">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 ">
                    <div class="form-button">
                        <button type="submit" class="btn btn-success" style="margin-top:26px; text-align:center;">Check
                            Out</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once('includes/web-footer.php') ?>
<?= $this->endSection() ?>
