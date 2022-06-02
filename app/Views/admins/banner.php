<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div style="padding:4px;">
            <a href="/admin/banner/add">
                <button class="btn">Create</button>
            </a>
        </div>
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($banners as $banner) {
                        ?>
                        <tr>
                            <td><?= $banner['banner_id'] ?></td>
                            <td><?= $banner['title'] ?></td>
                            <td><img src="<?php echo base_url() ?>/admins/uploads/<?= $banner['image'] ?>"
                                    style="width:76px;height:76px;" alt="">
                            </td>
                            <td>
                                <a href="/admin/delete/banner/<?php echo  $banner['banner_id']; ?>"
                                    class="margin-left:20px;">
                                    <button class="btn">delete</button>
                                </a>
                                <a href="/admin/edit/banner/<?php echo $banner['banner_id'] ?>">
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
