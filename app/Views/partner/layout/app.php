<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/admins/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>/admins/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin Login</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>/admins/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>/admins/css/animate.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url() ?>/admins/css/paper-dashboard.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>/admins/css/themify-icons.css" rel="stylesheet">


</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/vendor/dashboard" class="simple-text">
                        House Care
                    </a>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="/vendor/dashboard">
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/vendor/approve-order">
                            <i class="ti-panel"></i>
                            <p>Approve Order</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/vendor/orders">
                            <i class="ti-panel"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p><?= session()->get('v_name'); ?></p>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/vendor/logout">Logout</a></li>
                                    <li><a href="#">Update Profile</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <?= $this->renderSection('content') ?>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>

                            <li>
                                <a href="http://www.creative-tim.com">
                                    House Care
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; <script>
                        document.write(new Date().getFullYear())
                        </script>, made with <i class="fa fa-heart heart"></i> by <a
                            href="http://www.creative-tim.com">Creative Tim</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>/admins/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>/admins/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>/admins/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url() ?>/admins/js/app.js"></script>

    <script type="text/javascript">
    // $(document).ready(function() {

    //     demo.initChartist();

    //     $.notify({
    //         icon: 'ti-gift',
    //         message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

    //     }, {
    //         type: 'success',
    //         timer: 4000
    //     });

    // });
    // 

    $(document).ready(function() {
        $(document).on('click', '#orderId', function() {
            const id = $(this).data('id');
            if (!id) {
                alert('invalid id');
            } else {
                $.ajax({
                    url: '/vendor/view/orders',
                    type: 'POST',
                    data: {
                        id
                    },
                    success: function(data) {
                        console.log(data)
                        $("#view-order").html(data);
                    }
                })
            }
        });

        $(doucment).on('click', "#approve", function() {
            const id = $(this).data('id');
            if (!id) {
                alert('invalid id');
            } else {
                $.ajax({
                    url: '/partner/approved',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        window.location.href = 'http://localhost:8080/partner/login';
                    }
                })
            }
        })
    })
    </script>
</body>

</html>
