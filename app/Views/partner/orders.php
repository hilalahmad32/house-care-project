<?= $this->extend('partner/layout/app') ?>
<?= $this->section('title') ?>
Services
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">All</a></li>
            <li><a data-toggle="tab" href="#menu1">Pending Order</a></li>
            <li><a data-toggle="tab" href="#menu2">Compleleted Order</a></li>
            <li><a data-toggle="tab" href="#menu3">Rejected Order</a></li>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>All Orders</h3>
                <div class="card-body">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    View
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
                                    <td><?= $order['status'] == 1 ? "<span style='color:green'>Approve</span>" : "<span style='color:red'>Not Approve</span>"; ?>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#exampleModal"
                                            data-id='<?= $order['orders_id'] ?>' class="btn " id='orderId'>View</button>
                                    </td>
                                    <td><?php if ($order['status'] == 0) {
                                            ?>
                                        <a href="/vendor/approve/orders/<?= $order['orders_id'] ?>"> <button
                                                class="btn btn-primary"
                                                style="background-color: green;color:white;">Approve</button></a>
                                        <a href="/vendor/reject/orders/<?= $order['orders_id'] ?>">
                                            <button class="btn btn-primary"
                                                style="background-color: red;color:white;">Reject</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 1) {
                                            ?>
                                        <a href="/vendor/order/approve">
                                            <button class="btn btn-primary" disabled>Approved</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 2) {
                                            ?>
                                        <button class="btn btn-primary" disabled>Reject</button>
                                        <?php
                                            } ?>
                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Pending Order</h3>
                <div class="card-body">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders1 as $order) {
                                ?>
                                <tr>
                                    <td><?= $order['orders_id'] ?></td>
                                    <td><?= $order['name'] ?></td>
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
                                    <td><?= $order['status'] == 1 ? "<span style='color:green'>Approve</span>" : "<span style='color:red'>Not Approve</span>"; ?>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#exampleModal"
                                            data-id='<?= $order['orders_id'] ?>' class="btn " id='orderId'>View</button>
                                    </td>
                                    <td><?php if ($order['status'] == 0) {
                                            ?>
                                        <a href="/vendor/approve/orders/<?= $order['orders_id'] ?>"> <button
                                                class="btn btn-primary"
                                                style="background-color: green;color:white;">Approve</button></a>
                                        <a href="/vendor/reject/orders/<?= $order['orders_id'] ?>">
                                            <button class="btn btn-primary"
                                                style="background-color: red;color:white;">Reject</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 1) {
                                            ?>
                                        <a href="/vendor/order/approve">
                                            <button class="btn btn-primary" disabled>Approved</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 2) {
                                            ?>
                                        <button class="btn btn-primary" disabled>Reject</button>
                                        <?php
                                            } ?>
                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Compleleted Order</h3>
                <div class="card-body">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders2 as $order) {
                                ?>
                                <tr>
                                    <td><?= $order['orders_id'] ?></td>
                                    <td><?= $order['name'] ?></td>
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
                                    <td><?= $order['status'] == 1 ? "<span style='color:green'>Approve</span>" : "<span style='color:red'>Not Approve</span>"; ?>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#exampleModal"
                                            data-id='<?= $order['orders_id'] ?>' class="btn " id='orderId'>View</button>
                                    </td>
                                    <td><?php if ($order['status'] == 0) {
                                            ?>
                                        <a href="/vendor/approve/orders/<?= $order['orders_id'] ?>"> <button
                                                class="btn btn-primary"
                                                style="background-color: green;color:white;">Approve</button></a>
                                        <a href="/vendor/reject/orders/<?= $order['orders_id'] ?>">
                                            <button class="btn btn-primary"
                                                style="background-color: red;color:white;">Reject</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 1) {
                                            ?>
                                        <a href="/vendor/order/approve">
                                            <button class="btn btn-primary" disabled>Approved</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 2) {
                                            ?>
                                        <button class="btn btn-primary" disabled>Reject</button>
                                        <?php
                                            } ?>
                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Rejected Order</h3>
                <div class="card-body">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders3 as $order) {
                                ?>
                                <tr>
                                    <td><?= $order['orders_id'] ?></td>
                                    <td><?= $order['name'] ?></td>
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
                                    <td><?= $order['status'] == 1 ? "<span style='color:green'>Approve</span>" : "<span style='color:red'>Not Approve</span>"; ?>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#exampleModal"
                                            data-id='<?= $order['orders_id'] ?>' class="btn " id='orderId'>View</button>
                                    </td>
                                    <td><?php if ($order['status'] == 0) {
                                            ?>
                                        <a href="/vendor/approve/orders/<?= $order['orders_id'] ?>"> <button
                                                class="btn btn-primary"
                                                style="background-color: green;color:white;">Approve</button></a>
                                        <a href="/vendor/reject/orders/<?= $order['orders_id'] ?>">
                                            <button class="btn btn-primary"
                                                style="background-color: red;color:white;">Reject</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 1) {
                                            ?>
                                        <a href="/vendor/order/approve">
                                            <button class="btn btn-primary" disabled>Approved</button>
                                        </a>
                                        <?php
                                            } elseif ($order['status'] == 2) {
                                            ?>
                                        <button class="btn btn-primary" disabled>Reject</button>
                                        <?php
                                            } ?>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    style="background-color: rgba(0,0,0,0.5) !important;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
            </div>
            <div class="modal-body" id="view-order">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>


<?= $this->endSection() ?>
