<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div style="padding:4px;">
            <a href="/admin/location/add">
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
                        foreach ($locations as $location) {
                        ?>
                        <tr>
                            <td><?= $location['location_id'] ?></td>
                            <td><?= $location['location'] ?></td>
                            <td>
                                <div class="icon-container">
                                    <a href="/admin/location/delete/<?php echo $location['location_id'] ?>">
                                        <button class="btn">Delete</button>
                                    </a>
                                </div>
                                <div class="icon-container">
                                    <a href="/admin/location/edit/<?php echo $location['location_id'] ?>">
                                        <button class="btn">Edit</button>
                                    </a>
                                </div>
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
