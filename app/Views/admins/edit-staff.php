<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card " style="padding: 30px;">
        <form class="user-form" method="post" action="/admin/update/staff" style="width:400px;">
            <div class=" form-group"><input name='name' value="<?= $admins['name'] ?>" type="text" class="form-control"
                    placeholder="Enter your Name">
                <input name='admin_id' value="<?= $admins['admin_id'] ?>" type="hidden" class="form-control"
                    placeholder="Enter your Name">
            </div>
            <div class=" form-group">
                <input name='username' type="text" value="<?= $admins['username'] ?>" class="form-control"
                    placeholder="Enter your Username">
            </div>
            <div class="form-group"><input name="phone" value="<?= $admins['phone'] ?>" type="text" class="form-control"
                    placeholder="Enter your Phone">
            </div>
            <div class="form-group">
                <input name="email" type="email" value="<?= $admins['email'] ?>" class="form-control"
                    placeholder="Enter your email">
            </div>
            <div class="form-group">
                <select name="role" id="" class="form-control">
                    <?php foreach ($roles as $role) {
                        if ($admins['role'] == $role['role_id']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                    ?>
                    <option <?= $selected ?> value="<?= $role['role_id'] ?>"><?= $role['role'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-button">
                <button type="submit" class="btn">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection() ?>
