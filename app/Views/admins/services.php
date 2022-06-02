<?= $this->extend('admins/layout/app') ?>
<?= $this->section('title') ?>
Services
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div style="padding:4px;">
            <a href="/admin/service/add">
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
                        foreach ($services as $service) {
                        ?>
                        <tr>
                            <td><?= $service['service_id'] ?></td>
                            <td><?= $service['service_name'] ?></td>
                            <td><img src="<?php echo base_url() ?>/admins/uploads/<?= $service['image'] ?>"
                                    style="width:76px;height:76px;" alt="">
                            </td>
                            <td>
                                <a href="/admin/service/delete/<?php echo  $service['service_id']; ?>"
                                    class="margin-left:20px;">
                                    <button class="btn">delete</button>
                                </a>
                                <a href="/admin/service/edit/<?php echo $service['service_id'] ?>">
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
