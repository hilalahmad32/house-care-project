<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <?php $validation = \Config\Services::validation();  ?>
    <form style=" width: 500px;
        margin: auto;" method="post">
        <h3 class="my-2">Create Role </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Enter Role</label>
                    <input type="text" class="form-control border-input" id="location" placeholder="Location"
                        name="role">
                    <?php if ($validation->getError('role')) { ?>
                    <span class="text-danger">
                        <?= $error = $validation->getError('role'); ?>
                    </span>
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
