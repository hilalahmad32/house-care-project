<?= $this->extend('admins/layout/app') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Header</a></li>
            <li><a data-toggle="tab" href="#menu1">Footer</a></li>
            <li><a data-toggle="tab" href="#menu2">Menu</a></li>
        </ul>
        <div class="tab-content" style="padding: 10px;">
            <div id="home" class="tab-pane fade in active">
                <h3>Header Setting</h3>
                <div class="card-body">
                    <form action="" style="width: 400px;" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Header Title</label>
                            <input type="text" value='<?= $header['title'] ?>' class="form-control border-input"
                                id="title" placeholder="Title" name="title">
                            <input type="hidden" value='<?= $header['header_id'] ?>' class="form-control border-input"
                                id="header_id" placeholder="Title" name="header_id">

                        </div>
                        <div class="form-group">
                            <label for="image">Header Image</label>
                            <input type="file" id="image" name="new_image" class="form-control border-input"
                                placeholder="Header Image">
                            <img src="<?= base_url('admins/uploads/' . $header['image']) ?>" alt=""
                                style="width:80px;height:80px;object-fit:cover;">
                            <input type="hidden" name="old_image" value="<?= $header['image'] ?>" id="">
                        </div>
                        <button class="btn btn-succes" type="submit">Change</button>
                    </form>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Footer</h3>
                <div class="card-body">
                    <form action="/admin/update" style="width: 400px;" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Footer Title</label>
                            <input type="text" value='<?= $footer['footer_title'] ?>' class="form-control border-input"
                                id="footer_title" placeholder="Footer title" name="footer_title">
                            <input type="hidden" value='<?= $footer['footer_id'] ?>' class="form-control border-input"
                                id="footer_id" placeholder="Title" name="footer_id">
                        </div>
                        <div class="form-group">
                            <label>Footer fb link</label>
                            <input type="text" value='<?= $footer['fb_link'] ?>' class="form-control border-input"
                                id="fb_link" placeholder="Footer title" name="fb_link">

                        </div>
                        <div class="form-group">
                            <label>Insta Link</label>
                            <input type="text" value='<?= $footer['insta_link'] ?>' class="form-control border-input"
                                id="insta_link" placeholder="Footer title" name="insta_link">
                        </div>
                        <div class="form-group">
                            <label>Twiter Link</label>
                            <input type="text" value='<?= $footer['twt_link'] ?>' class="form-control border-input"
                                id="twt_link" placeholder="Footer title" name="twt_link">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value='<?= $footer['email'] ?>' class="form-control border-input"
                                id="email" placeholder="Footer title" name="email">
                        </div>
                        <div class="form-group">
                            <label>Footer description</label>
                            <textarea name="footer_desc" id="" class="form-control" cols="30"
                                rows="10"><?= $footer['footer_desc'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" value='<?= $footer['phone'] ?>' class="form-control border-input"
                                id="phone" placeholder="Footer title" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" value='<?= $footer['location'] ?>' class="form-control border-input"
                                id="location" placeholder="Footer title" name="location">
                        </div>
                        <div class="form-group">
                            <label for="image">Footer Image</label>
                            <input type="file" id="image" name="new_image" class="form-control border-input"
                                placeholder="Footer Image">
                            <img src="<?= base_url('admins/uploads/' . $footer['footer_image']) ?>" alt=""
                                style="width:80px;height:80px;object-fit:cover;">
                            <input type="hidden" name="old_image" value="<?= $footer['footer_image'] ?>" id="">
                        </div>
                        <button class="btn btn-succes" type="submit">Change</button>
                    </form>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu</h3>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($menus as $menu) {
                                ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $menu['menu'] ?></td>
                                    <td>
                                        <button data-toggle="modal" class="btn btn-primary"
                                            data-id="<?= $menu['menu_id'] ?>" id="menuId"
                                            data-target="#update">Edit</button>
                                        <button class="btn btn-primary">Delete</button>
                                    </td>
                                </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    style="background-color: rgba(0,0,0,0.5) !important;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
            </div>
            <form action='' id="menuform" method='post' enctype='multipart/form-data'>
                <div class="modal-body" id="menu-form">
                </div>
                <button class='btn btn-succes' id='submit'>Change</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>


<?= $this->endSection() ?>
