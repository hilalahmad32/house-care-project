<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($partners as $partner) {
                        ?>
                        <tr>
                            <td><?= $partner['part_id'] ?></td>
                            <td><?= $partner['name'] ?></td>
                            <td><?= $partner['email'] ?></td>
                            <td><?= $partner['phone'] ?></td>
                            <td><?= $partner['status'] ? "Approve" : 'Not Approve'; ?></td>
                            <td>
                                <?php
                                    if ($partner['status'] == 0) {
                                    ?>
                                <a href='/admin/partners/active/<?= $partner["part_id"] ?>' class='margin-left:20px;'>
                                    <button class='btn'>Activate Vendor</button></a>
                                <?php
                                    } else {
                                    ?>
                                <a href='' class='margin-left:20px;'>
                                    <button class='btn' disabled>Activated</button></a>
                                <?php
                                    }
                                    ?>

                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
