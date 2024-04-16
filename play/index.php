<?php
require_once __DIR__ . '/modal3/index.php';

require_once '/app/common/helpers.php';
HelperModules::init([
    'lockdown.enabled' => true,
    'cloaker.tier' => 'tier-2',
    'cloaker.campaign_id' => '366850',
    'cloaker.dir' => __DIR__,
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Meta -->
    <title>Kidly Games</title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Casino Games">
    <meta name="keywords" content="fun online games, fun slots, demo slots">
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="vendor/animate/animate.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css?v=1" rel="stylesheet" type="text/css"/>
</head>
<body>
<?= modalDisplay(); ?>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand mx-auto" href="index.html">
        <img src="img/logo.png" alt="Logo" class="logo">
    </a>
    <div id="toggler" class="wrapper custom-toggler navbar-toggler" data-toggle="collapse"
         data-target=".navbar-collapse">
        <div class="menu-toggle">
            <span class="icon-bars custom-toggler navbar-toggler-icon"></span>
        </div>
    </div>
    <div id="toggle-nav" class="navbar-collapse collapse">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="privacy.html">Privacy Policy</a></li>
            <li class="nav-item"><a class="nav-link" href="terms.html">Terms & Conditions</a></li>
        </ul>
    </div>
</nav>
<div class="Container">
    <div class="Content">
        <div class="Wrapper">
            <div class="LeftContent col-xl-6 col-sm-12 split-image-left background-1">
            </div>
            <div class="RightContent col-xl-6 col-sm-12 split-image-right">
                <div class="row justify-content-center">
                    <div class="col-9">
                        <div class="row">
                            <div class="">
                                <h2 CLASS="text-center" style="border-bottom: #000000 1px solid" >OUR INTRODUCTION</h2>
                                <p class="text-center">
                                    Thank you for stopping by. We offer games from top gaming software houses which are
                                    absolutely free of cost. We also update our site regularly to give you a new
                                    experience
                                    every time. Please scroll through the page to find the best leisure time game for
                                    yourself.
                                </p>

                                <h2 CLASS="text-center my-5" style="border-bottom: #000000 1px solid" >OUR GAMES</h2>
                                <p class="text-center">
                                    Find out our top games below
                                </p>

                                <h2 class="text-center text-uppercase">Legend of the Golden Monkey</h2>
                                <a href="1.html">
                                    <img class="img-fluid pb-5" src="img/342.jpg" alt="Photo">
                                </a>

                                <h2 class="text-center text-uppercase">Bicicleta</h2>
                                <a href="2.html">
                                    <img class="img-fluid  pb-5" src="img/340.jpg" alt="Photo">
                                </a>

                                <h2 class="text-center text-uppercase">Golden Fish Tank</h2>
                                <a href="3.html">
                                    <img class="img-fluid  pb-5" src="img/949.jpg" alt="Photo">
                                </a>

                                <h2 class="text-center text-uppercase">Legend of the White Snake</h2>
                                <a href="4.html">
                                    <img class="img-fluid pb-5" src="img/338.jpg" alt="Photo">
                                </a>

                            </div>

                            <footer style="border-top: #000000 1px solid" class="pt-5">
                                <div class="text-center">
                                    <img src="img/footerlogo.png" alt="" width="250" class="ft">
                                </div>
                                <p class="text-center">
                                    This is a FREE-TO-PLAY social casino games site where you
                                    use play credits only.
                                    This website does NOT offer "real money" gambling opportunities or chance to win
                                    prizes or gifts.
                                    This site is intended for 18+ adults only. Practicing at social casino site does NOT
                                    guarantee
                                    successes at "real money" gambling in future.
                                </p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript -->
<script src="vendor/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/wow/wow.js"></script>
<script src="js/script.js"></script>
<script>
    new WOW().init();
</script>
<!-- End Javascript -->
</body>
</html>