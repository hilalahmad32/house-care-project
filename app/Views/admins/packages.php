<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div style="padding:4px;">
            <a href="/admin/packages/add">
                <button class="btn">Create</button>
            </a>
        </div>
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($packages as $package) {
                        ?>
                        <tr>
                            <td><?= $package['pack_id'] ?></td>
                            <td><?= $package['title'] ?></td>
                            <td><?= $package['price'] ?></td>
                            <td><img src="<?php echo base_url() ?>/admins/uploads/<?= $package['image'] ?>"
                                    style="width:76px;height:76px;" alt="">
                            </td>
                            <td>
                                <a href="/admin/packages/delete/<?php echo  $package['pack_id']; ?>"
                                    class="margin-left:20px;">
                                    <button class="btn">delete</button>
                                </a>
                                <a href="/admin/packages/edit/<?php echo $package['pack_id'] ?>">
                                    <button class="btn">Edit</button>
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
