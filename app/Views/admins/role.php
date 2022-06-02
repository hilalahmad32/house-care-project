<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div style="padding:4px;">
            <a href="/admin/add/role">
                <button class="btn">Create</button>
            </a>
        </div>
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Role</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($roles as $role) {
                        ?>
                        <tr>
                            <td><?= $role['role_id'] ?></td>
                            <td><?= $role['role'] ?></td>
                            <td>
                                <div class="icon-container">
                                    <a href="/admin/delete/role/<?php echo $role['role_id'] ?>">
                                        <button class="btn">Delete</button>
                                    </a>
                                </div>
                                <div class="icon-container">
                                    <a href="/admin/edit/role/<?php echo $role['role_id'] ?>">
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
