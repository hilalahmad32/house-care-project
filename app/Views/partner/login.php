<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/admins/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>/admins/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Vendor Login</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>/admins/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>/admins/css/animate.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url() ?>/admins/css/paper-dashboard.css" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url() ?>/admins/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>/admins/css/themify-icons.css" rel="stylesheet">
    <style>
    form {
        width: 500px;
        margin: auto;
        margin-top: 15%;
    }

    </style>

</head>

<body>


    <div class="container d-flex justify-content-center">
        <form method="post">
            <h3 class="my-2">Vendor Login</h3>
            <?php $validation = \Config\Services::validation(); ?>

            <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-danger " role="alert">
                <strong><?= session()->getFlashdata('error') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="card " style="padding: 30px;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control border-input" id="email" placeholder="Email"
                            name="email">
                        <?php if ($validation->getError('email')) { ?>
                        <span class="text-danger">
                            <?= $error = $validation->getError('email'); ?>
                        </span>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control border-input"
                            placeholder="Password">
                        <?php if ($validation->getError('password')) { ?>
                        <span class="text-danger">
                            <?= $error = $validation->getError('password'); ?>
                        </span>
                        <?php } ?>
                    </div>
                    <button class="btn btn-succes" type="submit">Login</button>
                </div>
            </div>
        </form>

    </div>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>/admins/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>/admins/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo base_url() ?>/admins/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo base_url() ?>/admins/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>/admins/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="<?php echo base_url() ?>/admins/js/?>https://maps.googleapis.com/maps/api/js">
    </script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="<?php echo base_url() ?>/admins/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url() ?>/admins/js/app.js"></script>
    <script src="<?php echo base_url() ?>/admins/js/demo.js"></script>

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
    </script>
</body>

</html>
