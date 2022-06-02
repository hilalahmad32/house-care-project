<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" action="<?php echo base_url('/admin/category/update/'); ?>" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" id="put">
        <h3 class="my-2">Update Category </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>category name</label>
                    <input type="text" value="<?php echo $categorys['category_name'] ?>"
                        class="form-control border-input" id="category_name" placeholder="Username"
                        name="category_name">
                    <input type="text" value="<?php echo $categorys['category_id'] ?>" class="form-control border-input"
                        id="id" placeholder="Username" name="id">
                </div>
                <div class="form-group">
                    <label>Category Icon</label>
                    <input type="text" class="form-control border-input" value="<?php echo $categorys['icons'] ?>"
                        id="icons" placeholder="Username" name="icons">
                </div>
                <div class="form-group">
                    <label for="image">Upload Category image</label>
                    <input type="file" id="new_image" name="new_image" class="form-control border-input"
                        placeholder="Image">
                    <img src="<?php echo base_url('/admins/uploads/' . $categorys['image']); ?>"
                        style="width:70px;height:70px;" alt="">
                    <input type="text" value="<?php echo $categorys['image'] ?>" id="old_image" name="old_image"
                        class="form-control border-input" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-succes">Update</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
