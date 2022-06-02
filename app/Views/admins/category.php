<?= $this->extend('admins/layout/app') ?>
<?= $this->section('title') ?>
Category
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" style="margin-top:20px;">
    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success" style="width:400px; margin-top:10px;" role="alert">
            <strong><?= session()->getFlashdata('success') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if (session()->getFlashdata('error')) { ?>
        <div class="alert alert-danger " style="width: 400px;" role="alert">
            <strong><?= session()->getFlashdata('error') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <div class="card">
        <div style="padding:4px;">
            <a href="/admin/category/add">
                <button class="btn">Create</button>
            </a>
        </div>
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Icons</th>
                        <th>Image</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categorys as $category) {
                        ?>
                            <tr>
                                <td><?= $category['category_id'] ?></td>
                                <td><?= $category['category_name'] ?></td>
                                <td><img src="<?php echo base_url() ?>/admins/uploads/<?= $category['icons'] ?>" style="width:76px;height:76px;" alt="">
                                </td>
                                <td><img src="<?php echo base_url() ?>/admins/uploads/<?= $category['image'] ?>" style="width:76px;height:76px;" alt="">
                                </td>
                                <td>
                                    <a href="/admin/category/delete/<?php echo  $category['category_id']; ?>" class="margin-left:20px;">
                                        <button class="btn">delete</button>
                                    </a>
                                    <a href="/admin/category/edit/<?php echo $category['category_id'] ?>">
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