<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Phone</th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {
                        ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['city'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td><?= $user['state'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td>
                                <a href='/admin/edit/users/<?= $user["user_id"] ?>' class='margin-left:20px;'>
                                    <button class='btn'>Edit</button></a>
                                <a href='/admin/delete/users/<?= $user["user_id"] ?>' class='margin-left:20px;'>
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
