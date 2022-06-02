<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Package Name</th>
                        <th>Price</th>
                        <th>Username</th>
                        <th>image</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($carts as $cart) {
                        ?>
                        <tr>
                            <td><?= $cart['cart_id'] ?></td>
                            <td><?= $cart['title'] ?></td>
                            <td><?= $cart['price'] ?></td>
                            <td><?= $cart['name'] ?></td>
                            <td><?= $cart['status'] ? "Approve" : 'Not Approve'; ?></td>
                            <td><img src="<?php echo base_url() ?>/admins/uploads/<?= $cart['image'] ?>"
                                    style="width:76px;height:76px;" alt="">
                            </td>
                            <td>
                                <?php
                                    if ($cart['status'] == 0) {
                                    ?>
                                <a href='/admin/assign/<?= $cart["cart_id"] ?>' class='margin-left:20px;'>
                                    <button class='btn'>Assign to Vendor</button></a>
                                <?php
                                    } else {
                                    ?>
                                <a href='' class='margin-left:20px;'>
                                    <button class='btn' disabled>Package Assigned</button></a>
                                <?php
                                    }
                                    ?>

                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-center">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
