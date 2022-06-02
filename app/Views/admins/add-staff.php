<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card " style="padding: 30px;">
        <form class="user-form" method="post" style="width:400px;">
            <div class=" form-group"><input name='name' type="text" class="form-control" placeholder="Enter your Name">
            </div>
            <div class=" form-group">
                <input name='username' type="text" class="form-control" placeholder="Enter your Username">
            </div>
            <div class="form-group"><input name="phone" type="text" class="form-control" placeholder="Enter your Phone">
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <select name="role" id="" class="form-control">
                    <?php foreach ($roles as $role) {
                    ?>
                    <option value="<?= $role['role_id'] ?>"><?= $role['role'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-button">
                <button type="submit" class="btn">Save</button>
            </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection() ?>
