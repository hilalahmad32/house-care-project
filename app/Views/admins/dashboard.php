<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div style="padding:4px;">
            <h3>Dashboard</h3>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Category</h3>
                            <h4><?= $category ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Location</h3>
                            <h4><?= $location ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Services</h3>
                            <h4><?= $service ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Package</h3>
                            <h4><?= $package ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Orders</h3>
                            <h4><?= $order ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Partners</h3>
                            <h4><?= $partner ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Banner</h3>
                            <h4><?= $banner ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>User</h3>
                            <h4><?= $user ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Role</h3>
                            <h4><?= $role ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Admin</h3>
                            <h4><?= $admin ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
