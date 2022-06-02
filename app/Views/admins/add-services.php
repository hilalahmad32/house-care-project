<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" method="post" enctype="multipart/form-data">
        <h3 class="my-2">Create Services </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Services name</label>
                    <input type="text" class="form-control border-input" id="service_name" placeholder="Serices Name"
                        name="service_name">
                </div>
                <div class="form-group">
                    <label>Enter Category</label>
                    <select name="cat_id" id="cat_id" class="form-control">
                        <?php
                        foreach ($categorys as $category) {
                        ?>
                        <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Enter category</label>
                    <select name="loc_id" id="loc_id" class="form-control">
                        <?php
                        foreach ($locations as $location) {
                        ?>
                        <option value="<?php echo $location['location_id'] ?>"><?php echo $location['location'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image"> Upload gallery</label>
                    <input type="file" id="gallery" name='images[]' multiple="" class="form-control border-input"
                        placeholder="Image">
                </div>
                <div class="form-group">
                    <label for="image"> Upload image</label>
                    <input type="file" id="image" name="image" class="form-control border-input" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
