<?php
$settings = new \App\Models\Setting;
$setting = $settings->find(1);
?>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div class="header-top-welcome">
                    <p>Welcome to <?= $setting['header_name'] ?> Company </p>
                </div>
            </div>
            <div class="col-md-5 col-lg-3">
            </div>
            <div class="col-md-7 col-lg-4">
                <ul class="header-top-list">
                    <li><a href="#">offers</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#becomaePartner">Become Partner</a></li>
                    <li><a href="#">contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-media-group">
                <button class="header-user">
                    <img src="<?php echo base_url('images/user.png') ?>" alt="user">
                </button>
                <a href="/"><img src="<?php echo base_url('images/logo.png') ?>" alt="logo"></a>
                <button class="header-src"><i class="fas fa-search"></i></button>
            </div>
            <a href="/" class="header-logo">
                <img src="<?php echo $setting['header_logo'] ?>" alt="logo"></a>
            <form class="frmSearch" action="<?php echo base_url() ?>Services/redirectsearchservice" method="Post">
                <div class="row header-form" style="background: none !important; border: none !important">

                    <div class="col-lg-3">

                        <div class="input-group-prepend search-line">
                            <?php

                            use App\Models\Location;

                            // $url = "https://ipinfo.io/json";
                            // $ch = curl_init($url);
                            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                            // $result = curl_exec($ch);
                            // curl_close($ch);
                            // $data = json_decode($result, true);

                            //strtolower($data['city']) ==
                            $location = new Location();
                            $locations = $location->orderBy('location_id', 'DESC')->findAll();
                            ?>
                            <select class="form-control" id="location">
                                <option value="Select Your state">Select your State</option>
                                <?php
                                foreach ($locations as $location) {
                                    if (strtolower($location['location'])) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                <option <?php echo $selected ?> value="<?= $location['location_id'] ?>">
                                    <?= $location['location'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="frmSearch">
                            <input type="text" id="search-box" class="search-logout form-control" name="keyword"
                                placeholder="Service Name" autocomplete="On">
                            <div id="suggesstion-box1"></div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <button type="submit" class="btn" style="background-color: #F8CB03">Submit</button>
                    </div>
                </div>
            </form>

            <!--   <div class="header-widget-group">
            <button type="submit" class="form-btn-group"><span>Become Partner</span></button>
            </div>  -->
            <div class="header-widget-group">
                <?php
                if (session()->get('user_id')) { ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="mydrop"
                        data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                        My Account
                    </button>
                    <div class="dropdown-menu" id="drop">
                        <a class="dropdown-item" href="/users/logout">Logout</a>
                        <a class="dropdown-item" href="/users/edit/profile">Your Profile</a>
                    </div>
                </div>
                <?php
                } else {

                ?>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#product-view"
                    style="padding: 9px 9px; margin-left:30px;border-radius: 6px;border: 2px solid #F8CB03;background-color: #F8CB03">Login
                </button>
                <?php
                }

                $carts = new \App\Models\AddToCart();
                $count = $carts->where('u_id', session()->get('user_id'))->countAllResults();
                ?>

                <a href="/users/carts" class="ml-2">
                    <button class="header-widget header-cart"><i
                            class="fas fa-shopping-basket"></i><sup><?= $count ?></sup>
                    </button>
                </a>

            </div>
            <?php
            if (session()->get('user_id')) {
            ?>
            <button class="header-widget dropdown-toggle" type="button" id="mydrop1" data-bs-toggle="dropdown"
                aria-bs-haspopup="true" aria-bs-expanded="false"><i class="fa-solid fa-bell"></i><sup id="total"></sup>
            </button>
            <div class="dropdown-menu" id="drop1" style="max-height:50vh;overflow:auto">
                <ul style="padding:10px;" id="notify">
                </ul>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</header>
<div class="modal fade" id="product-view">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 100%;background-color:white; padding
        :20px;">
            <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
            <link rel="stylesheet" href="<?= base_url('css/user-auth.css') ?>">
            <section class="user-form-part">
                <div class="container">
                    <!-- Tab links -->
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London') " id="defaultOpen">Login</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Register</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">OTP</button>
                    </div>

                    <!-- Tab content -->
                    <div id="London" class="tabcontent">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="user-form-card">
                                    <div class="user-form-title">
                                        <h2>welcome!</h2>
                                        <p>Use your credentials to access</p>
                                    </div>
                                    <div class="user-form-group">
                                        <form class="user-form">
                                            <div class="form-group"><input id="login_email" type="email"
                                                    class="form-control" placeholder="Enter your email"></div>
                                            <div class="form-group"><input id="login_password" type="password"
                                                    class="form-control" placeholder="Enter your password">
                                            </div>
                                            <div class="form-button">
                                                <button type="submit" id="login">login</button>
                                                <p>Forgot your password?<a href="#">reset here</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="Paris" class="tabcontent">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="user-form-card">
                                    <div class="user-form-title">
                                        <h2>welcome!</h2>
                                        <p>Create Account</p>
                                    </div>
                                    <div class="user-form-group">
                                        <form class="user-form">
                                            <div class="form-group"><input id="name" type="text" class="form-control"
                                                    placeholder="Enter your Name"></div>
                                            <div class="form-group"><input id="phone" type="text" class="form-control"
                                                    placeholder="Enter your Phone"></div>
                                            <div class="form-group"><input id="city" type="text" class="form-control"
                                                    placeholder="Enter your City"></div>
                                            <div class="form-group"><input id="state" type="text" class="form-control"
                                                    placeholder="Enter your State"></div>
                                            <div class="form-group"><input id="address" type="text" class="form-control"
                                                    placeholder="Enter your Address"></div>
                                            <div class="form-group"><input id="email" type="email" class="form-control"
                                                    placeholder="Enter your email"></div>
                                            <div class="form-group"><input id="password" type="password"
                                                    class="form-control" placeholder="Enter your password">
                                            </div>
                                            <div class="form-button">
                                                <button type="submit" class="btn" id="register">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="Tokyo" class="tabcontent">
                        <h3>Tokyo</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<div class="modal fade" id="becomaePartner">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 100%;background-color:white; padding
        :20px;">
            <button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
            <link rel="stylesheet" href="<?= base_url('css/user-auth.css') ?>">
            <section class="user-form-part">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="user-form-card">
                                <div class="user-form-title">
                                    <h2>welcome!</h2>
                                    <p>Create Account</p>
                                </div>
                                <div class="user-form-group">
                                    <form class="user-form">
                                        <div class="form-group"><input id="p_name" type="text" class="form-control"
                                                placeholder="Enter your Name"></div>
                                        <div class="form-group"><input id="p_phone" type="text" class="form-control"
                                                placeholder="Enter your Phone"></div>
                                        <div class="form-group"><input id="p_email" type="email" class="form-control"
                                                placeholder="Enter your email"></div>
                                        <div class="form-group"><input id="p_password" type="password"
                                                class="form-control" placeholder="Enter your password">
                                        </div>
                                        <div class="form-button">
                                            <button type="submit" class="btn" id="p_register">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
</div>
