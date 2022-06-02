<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <form style=" width: 500px;
        margin: auto;" action="/admin/location/update" method="post">
        <input type="hidden" name="_method" id="put">
        <h3 class="my-2">Update Location </h3>
        <div class="card " style="padding: 30px;">
            <div class="card-body">
                <div class="form-group">
                    <label>Enter Location</label>
                    <input type="hidden" class="form-control border-input" id="id" placeholder="Username" name="id"
                        value='<?php echo $locations['location_id']; ?>'>
                    <input type="text" class="form-control border-input" id="location" placeholder="Username"
                        name="location" value='<?php echo $locations['location']; ?>'>
                </div>

                <button type="submit" class="btn btn-succes">update</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
