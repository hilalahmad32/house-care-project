<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <?php $validation = \Config\Services::validation();  ?>
    <form style=" width: 500px;
        margin: auto;" method="post">
        <h3 class="my-2">Creat Location </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Enter Location</label>
                    <input type="text" class="form-control border-input" id="location" placeholder="Location"
                        name="location">
                    <?php if ($validation->getError('location')) { ?>
                    <span class="text-danger">
                        <?= $error = $validation->getError('location'); ?>
                    </span>
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
