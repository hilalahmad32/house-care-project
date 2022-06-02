<?= $this->extend('partner/layout/app') ?>
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
                            <h3>Pending Order</h3>
                            <h4><?= $pendding ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Complete Order</h3>
                            <h4><?= $complete ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color:red; color:white">
                    <div class="card-body " style="padding:10px;">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <h3>Reject</h3>
                            <h4><?= $reject ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
