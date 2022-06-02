<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" action="/admin/update/role" method="post">
        <input type="hidden" name="_method" id="put">
        <h3 class="my-2">Update Role </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Enter Role</label>
                    <input type="hidden" class="form-control border-input" id="id" placeholder="Username" name="id"
                        value='<?php echo $roles['role_id']; ?>'>
                    <input type="text" class="form-control border-input" id="role" placeholder="Username" name="role"
                        value='<?php echo $roles['role']; ?>'>
                </div>

                <button type="submit" class="btn btn-succes">update</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
