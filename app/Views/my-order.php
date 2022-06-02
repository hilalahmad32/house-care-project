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
                <div class="card">
                    <div class="card-body">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>Phone</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Payment Method</th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($orders as $order) {
                                    ?>
                                    <tr>
                                        <td><?= $order['orders_id'] ?></td>
                                        <td><?= $order['name'] ?></td>
                                        <td><?= $order['email'] ?></td>
                                        <td><?= $order['city'] ?></td>
                                        <td><?= $order['address'] ?></td>
                                        <td><?= $order['state'] ?></td>
                                        <td><?= $order['phone'] ?></td>
                                        <td><?= $order['qty'] ?></td>
                                        <td><?= $order['total_price'] ?></td>
                                        <td>
                                            <?php if ($order['payment_method'] == 1) {
                                                    echo 'Paypal';
                                                } elseif ($order['payment_method'] == 2) {
                                                    echo 'Google Pay';
                                                } elseif ($order['payment_method'] == 3) {
                                                    echo "Cash on Delivery";
                                                } ?>
                                        </td>
                                        <td><?= $order['status'] == 1 ? "Approve" : 'Not Approve'; ?></td>
                                        <td><?= $order['status'] == 1 ? "" : "<a href='/users/delete/{$order['orders_id']}' class='btn btn-success'>Delete</a>"; ?>
                                        </td>
                                    </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/web-footer.php') ?>

<?= $this->endSection() ?>
