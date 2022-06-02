<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card " style="padding: 30px;">
        <form class="user-form" method="post" action="/admin/update/users">
            <div class=" form-group"><input name='name' value='<?= $users['name'] ?>' type="text" class="form-control"
                    placeholder="Enter your Name">
            </div>
            <div class="form-group"><input name='id' value='<?= $users['user_id'] ?>' type="hidden" class="form-control"
                    placeholder="Enter your Name">
            </div>
            <div class="form-group"><input name="phone" value='<?= $users['phone'] ?>' type="text" class="form-control"
                    placeholder="Enter your Phone">
            </div>
            <div class="form-group"><input name="city" value='<?= $users['city'] ?>' type="text" class="form-control"
                    placeholder="Enter your City">
            </div>
            <div class="form-group"><input name="state" value='<?= $users['state'] ?>' type="text" class="form-control"
                    placeholder="Enter your State">
            </div>
            <div class="form-group"><input name="address" value='<?= $users['address'] ?>' type="text"
                    class="form-control" placeholder="Enter your Address"></div>
            <div class="form-group"><input name="email" value='<?= $users['email'] ?>' type="email" class="form-control"
                    placeholder="Enter your email">
            </div>
            <div class="form-button">
                <button type="submit" class="btn">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection() ?>
