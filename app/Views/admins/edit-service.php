<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" action="<?php echo base_url('/admin/service/update/'); ?>" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <h3 class="my-2">Update Services </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Services name</label>
                    <input type="text" class="form-control border-input" id="service_name" placeholder="Serices Name"
                        name="service_name" value="<?php echo $services['service_name'] ?>">
                    <input type="text" class="form-control border-input" id="id" placeholder="Serices Name" name="id"
                        value="<?php echo $services['service_id'] ?>">
                </div>
                <div class="form-group">
                    <label>Enter Category</label>
                    <select name="cat_id" id="cat_id" class="form-control">
                        <?php
                        foreach ($categorys as $category) {
                            if ($category['category_id'] == $services['cat_id']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                        ?>
                        <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <input type="text" name="old_category" value="<?php echo $services['cat_id'] ?>">
                <div class="form-group">
                    <label>Enter Location</label>
                    <select name="loc_id" id="loc_id" class="form-control">
                        <?php
                        foreach ($locations as $location) {
                            if ($location['location_id'] == $services['loc_id']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                        ?>
                        <option <?= $selected ?> value="<?php echo $location['location_id'] ?>">
                            <?php echo $location['location'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image"> Upload image</label>
                    <input type="file" id="new_image" name="new_image" class="form-control border-input"
                        placeholder="Image">
                    <img src="<?php echo base_url('/admins/uploads/' . $services['image']); ?>"
                        style="width:70px;height:70px;" alt="">
                    <input type="text" value="<?php echo $services['image'] ?>" id="old_image" name="old_image"
                        class="form-control border-input" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
