<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" action="<?php echo base_url('/admin/assginorder'); ?>" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <h3 class="my-2">Assign Order to Vendor / Partner </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>carts name</label>
                    <input type="text" class="form-control border-input" id="c_id" placeholder="Serices Name" name="id"
                        value="<?php echo $carts['cart_id'] ?>">
                    <input type="text" class="form-control border-input" id="u_id" name="u_id"
                        value="<?php echo $carts['u_id'] ?>">
                </div>
                <div class="form-group">
                    <label>carts name</label>
                    <input type="text" class="form-control border-input" id="pk_id" placeholder="Serices Name"
                        name="p_id" value="<?php echo $carts['pk_id'] ?>">
                </div>
                <div class="form-group">
                    <select name="v_id" id="">
                        <option value="">Select Any vendor</option>
                        <?php

                        foreach ($partners as $partner) {
                        ?>
                        <option value="<?php echo $partner['part_id'] ?>">
                            <?php echo $partner['name'] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-succes">Assign Order</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
