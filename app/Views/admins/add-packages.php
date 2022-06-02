<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" method="post" enctype="multipart/form-data">
        <h3 class="my-2">Create Packages </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Package name</label>
                    <input type="text" class="form-control border-input" id="title" placeholder="Package Name" name="title">
                </div>
                <div class="form-group">
                    <label>Enter Sercvices</label>
                    <select name="service_id" id="ser_id" class="form-control">
                        <?php
                        foreach ($services as $service) {
                        ?>
                            <option value="<?php echo $service['service_id'] ?>"><?php echo $service['service_name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control border-input" id="price" placeholder="Price" name="price">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image"> Upload image</label>
                    <input type="file" id="image" name="image" class="form-control border-input" placeholder="Image">
                </div>

                <div class="form-group">
                    <label for="image"> Upload Short Video</label>
                    <input type="file" id="video" name="video" class="form-control border-input" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-succes">Save</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>