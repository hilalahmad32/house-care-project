<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" method="post" enctype="multipart/form-data">
        <h3 class="my-2">Create Banner </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control border-input" id="title" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Upload image</label>
                    <input type="file" id="image" name="image" class="form-control border-input" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
