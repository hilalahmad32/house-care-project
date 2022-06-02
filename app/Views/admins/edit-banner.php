<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" action="<?php echo base_url('/admin/banner/update/'); ?>" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">

        <h3 class="my-2">Create Banner </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" value="<?php echo $banners['title'] ?>" class="form-control border-input"
                        id="title" placeholder="Title" name="title">
                    <input type="text" value="<?php echo $banners['banner_id'] ?>" class=" form-control border-input"
                        id="id" name="id">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="" cols="30" rows="10"
                        class="form-control"><?php echo $banners['content'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Upload image</label>
                    <input type="file" id="new_image" name="new_image" class="form-control border-input"
                        placeholder="Image">
                    <img src="<?php echo base_url('/admins/uploads/' . $banners['image']); ?>"
                        style="width:70px;height:70px;" alt="">
                    <input type="text" value="<?php echo $banners['image'] ?>" id="old_image" name="old_image"
                        class="form-control border-input" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
