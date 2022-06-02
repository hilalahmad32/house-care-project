<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div style="padding:4px;">
            <a href="/admin/add/staff">
                <button class="btn">Create</button>
            </a>
        </div>
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($admins as $admin) {
                        ?>
                        <tr>
                            <td><?= $admin['admin_id'] ?></td>
                            <td><?= $admin['name'] ?></td>
                            <td><?= $admin['email'] ?></td>
                            <td><?= $admin['phone'] ?></td>
                            <td>
                                <a href='/admin/edit/staff/<?= $admin["admin_id"] ?>' class='margin-left:20px;'>
                                    <button class='btn'>Edit</button></a>
                                <a href='/admin/delete/staff/<?= $admin["admin_id"] ?>' class='margin-left:20px;'>
                                    <button class='btn'>Delete</button></a>
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
