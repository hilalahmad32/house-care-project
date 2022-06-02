<?= $this->extend('partner/layout/app') ?>
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
                        <th>Quantaty</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($assgins as $ass) {
                        ?>
                        <tr>
                            <td><?= $ass['ass_id'] ?></td>
                            <td><?= $ass['title'] ?></td>
                            <td><?= $ass['price'] ?></td>
                            <td><?= $ass['qty'] ?></td>
                            <td><?= $ass['name'] ?></td>
                            <td>
                                <?php
                                    if ($ass['status'] == 1) {
                                        echo 'Approved';
                                    } else {
                                        echo 'not Approved';
                                    }
                                    ?>
                            </td>
                            <td>

                                <?php
                                    if ($ass['status'] == 1) {   ?>
                                <a href=""> <button class=" btn" disabled="disabled">Approved</button>
                                </a>
                                <?php
                                    } else {
                                    ?>
                                <a href="/vendor/approve/<?php echo  $ass['ass_id']; ?>" class="margin-left:20px;">
                                    <button class="btn">Approve</button>
                                </a>
                                <?php
                                    }
                                    ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
