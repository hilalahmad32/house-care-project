<?= $this->extend('admins/layout/app') ?>
<?= $this->section('title') ?>
Add-Category
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" method="post" enctype="multipart/form-data">
        <h3 class="my-2">Create Category </h3>
        <?php if (session()->getFlashdata('error')) { ?>
        <div class="alert alert-danger" style="width: 20%px;" role="alert">
            <strong><?= session()->getFlashdata('error') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control border-input" id="category_name" placeholder="Category Name"
                        name="category_name">
                    <?php if ($validation->getError('category_name')) { ?>
                    <span class="text-danger">
                        <?= $error = $validation->getError('category_name'); ?>
                    </span>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="image">Upload Category Icons</label>
                    <input type="file" id="icons" name="icons" class="form-control border-input" accept="png"
                        placeholder="Image">
                    <?php if ($validation->getError('icons')) { ?>
                    <span class="text-danger">
                        <?= $error = $validation->getError('icons'); ?>
                    </span>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="image">Upload Category image</label>
                    <input type="file" id="image" name="image" class="form-control border-input" placeholder="Image">
                    <?php if ($validation->getError('image')) { ?>
                    <span class="text-danger">
                        <?= $error = $validation->getError('image'); ?>
                    </span>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
