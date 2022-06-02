<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" action="/admin/update/packages" method="post" enctype="multipart/form-data">
        <h3 class="my-2">Create Packages </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Package name</label>
                    <input type="text" class="form-control border-input" id="title" placeholder="Package Name"
                        name="title" value="<?= $packages['title'] ?>">

                    <input type="text" class="form-control border-input" id="id" value="<?= $packages['pack_id'] ?>"
                        placeholder="Package Name" name="id">
                </div>
                <div class="form-group">
                    <label>Enter Sercvices</label>
                    <select name="service_id" id="ser_id" class="form-control">
                        <?php
                        foreach ($services as $service) {
                            if ($service['service_id'] == $packages['service_id']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                        ?>
                        <option <?= $selected ?> value="<?php echo $service['service_id'] ?>">
                            <?php echo $service['service_name'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" value="<?= $packages['price'] ?>" class="form-control border-input" id="price"
                        placeholder="Price" name="price">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="" cols="30" rows="10"
                        class="form-control"><?= $packages['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="image"> Upload image</label>
                    <input type="file" id="new_image" name="new_image" class="form-control border-input"
                        placeholder="Image">
                    <img src="<?php echo base_url('/admins/uploads/' . $packages['image']); ?>"
                        style="width:70px;height:70px;" alt="">
                    <input type="text" value="<?php echo $packages['image'] ?>" id="old_image" name="old_image"
                        class="form-control border-input" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
