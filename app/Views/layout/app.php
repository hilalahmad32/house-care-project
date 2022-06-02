<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content=" ">
    <meta name="title" content=" ">
    <meta name="keywords" content=" ">
    <title><?= $this->renderSection('title') ?>
    </title>
    <link rel="icon" href="<?php echo base_url() ?>/images/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .tns-outer [aria-controls],
    .tns-outer [data-action] {
        cursor: pointer;
        display: none;
    }



    .head12 {
        background-color: #F8CB03;
        color: white;
    }

    .product-card {
        border: 1px solid #F8CB03;
    }

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .active {
        display: block;
    }

    </style>
</head>

<body>

    <?= $this->renderSection('content') ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="<?php echo base_url() ?>/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/countdown/countdown.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/niceselect/nice-select.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/slickslider/slick.min.js"></script>
    <script src="<?php echo base_url() ?>/vendor/venobox/venobox.min.js"></script>
    <script src="<?php echo base_url() ?>/js/nice-select.js"></script>
    <script src="<?php echo base_url() ?>/js/countdown.js"></script>
    <script src="<?php echo base_url() ?>/js/accordion.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script src="<?php echo base_url() ?>/js/venobox.js"></script>
    <script src="<?php echo base_url() ?>/js/slick.js"></script>
    <script src="<?php echo base_url() ?>/js/main.js"></script>
    <script src="<?php echo base_url() ?>/admins/js/app.js"></script>

    <script>
    $(document).ready(function() {
        $("#location").on('change', function() {
            const data = $(this).val();
            // $.ajax({
            //     url: 'https://ipinfo.io/json',
            //     type: 'GET',
            //     headers: {
            //         Authorization: 'Bearer 4a9219eb252d6f',
            //     },
            //     success: function(data) {

            //     }
            // })
            window.location.href = '/locations/' + data
        })
        $("#p_register").click(function(e) {
            e.preventDefault();
            const name = $("#p_name").val();
            const email = $("#p_email").val();
            const phone = $("#p_phone").val();
            const password = $("#p_password").val();

            $.ajax({
                url: '/partners/register',
                type: 'POST',
                data: {
                    name,
                    email,
                    phone,
                    password
                },
                success: function(data) {
                    console.log(data)
                }
            })
        })

        $("#login").click(function(e) {
            e.preventDefault();
            const email = $("#login_email").val();
            const password = $("#login_password").val();

            $.ajax({
                url: '/users/login',
                type: 'POST',
                data: {
                    email,
                    password
                },
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        alert('your login success');
                        $("#product-view").modal('hide');
                        $("#login_email").val('');
                        $("#login_password").val('');
                        window.location.href = "/"
                    } else {
                        alert('Invlaid email and password');

                    }
                }
            })
        })

        $("#register").click(function(e) {
            e.preventDefault();
            const name = $("#name").val();
            const email = $("#email").val();
            const phone = $("#phone").val();
            const city = $("#city").val();
            const state = $("#state").val();
            const address = $("#address").val();
            const password = $("#password").val();

            $.ajax({
                url: '/users/register',
                type: 'POST',
                data: {
                    name,
                    email,
                    phone,
                    city,
                    state,
                    address,
                    password
                },
                success: function(data) {
                    console.log(data)
                }
            })
        })

        $(document).on('click', '#deletecart', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            $.ajax({
                url: '/users/deletecart',
                type: 'GET',
                data: {
                    id
                },
                success: function(data) {
                    window.location.href = '/users/carts'
                }
            })
        })

        const getNotify = () => {
            $.ajax({
                url: '/users/notify',
                type: 'GET',
                success: function(data) {
                    $("#notify").html(data);
                }
            })
        }
        getNotify();

        const total = () => {
            $.ajax({
                url: '/users/total',
                type: 'GET',
                success: function(data) {
                    $("#total").text(data);
                }
            })
        }
        total();

        $("#mydrop1").on('click', function() {
            $.ajax({
                url: '/users/updatenotify',
                type: 'POST',
                success: function(data) {
                    console.log(data);
                    total();
                }
            })
        })
    })

    document.querySelector("#mydrop").addEventListener("click", function() {
        document.querySelector("#drop").classList.toggle("active")
    });


    document.querySelector("#mydrop1").addEventListener("click", function() {
        document.querySelector("#drop1").classList.toggle("active")
    });

    document.getElementById("defaultOpen").click();


    function openCity(evt, cityName) {

        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

    <script type="module">
    var slider = tns({
        container: '.my-slider',
        items: 2,
        slideBy: 'page',
        autoplay: true,
        controls: false,
        autoplayTimeout: 2000

    });
    </script>
</body>

</html>
