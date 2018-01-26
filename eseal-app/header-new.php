

<link href="http://templines.rocks/html/sokolcov/transcargo/css/master.cssX" type="text/css" rel="stylesheet">
<?php /* ?>
<style>
    .logo img {
        max-width: 100% !important;
        padding: 25px 0px !important;
    }
    @media (min-width: 768px)
    {
        .navbar {
            min-height: 30px !important;
            float: right !important;
        }
        .navbar-nav>li>a {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }
    }

    .main-header {background: #4E4E4E; }

    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
        color: #00bfff;
    }
    .navbar-default .navbar-nav>li>a {
        color: #00bfff;
    }
    .mail-link ul li {
        color: #00bfff;
    }
    .mail-link ul li a {
        color: #00bfff;
    }

</style>
<div class="main-header" style="padding: 5px 0;">
<div class="container-fluid">
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12 logo">
<h3><a href="index.php">
        <img src="images/logo-blue.png" alt="Sri Sai Ganesh Associates" title="Sri Sai Ganesh Associates" class="img-responsive">
    </a>
</h3>
</div>
<div class="col-md-8 col-sm-8 col-xs-12">

    <div class="top-barX" style="padding-bottom: 50px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="mail-link mail-rightX">

                        <?php if(isset($_SESSION['exporteruserid'])){ ?>
                            <ul>
                                <li><i class="fa fa-phone"></i> Hotline: 044-48677050</li>
                                <li><a href="dashboard.php"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['exporterusername']; ?></a></li>
                                <li><a href="my-account.php"><i class="fa fa-asterisk"></i> My Account</a></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        <?php } else { ?>
                            <ul>
                                <li><i class="fa fa-phone"></i> Hotline: 044-48677050</li>
                                <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="registration-terms.php"><i class="fa fa-user"></i> Register</a></li>
                            </ul>
                        <?php } ?>

                    </div><!--Mail Link-->
                </div><!--Column 6-->

            </div><!--Row-->
        </div><!--Container-->
    </div><!--Top Bar-->



    <nav class="navbar navbar-default">
  <div class="container-full">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand visible-xs" href="#">Menu</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="about-us.php">About us</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="contact-us.php">Contact Us</a></li> 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div><!-- Column 12 -->
</div><!-- Row -->
</div><!-- Container -->
</div><!-- Main Header -->
<?php */ ?>

<style>
#logo {
	width: 430px;
	height: 90px;
}

.top-bar, .top-menu nav:first-child::before {
	border-top-color: #228dcb !important;
}

.top-bar {
	border-top: 6px solid #228dcb !important;
}
.top-menu nav {
    background: #228dcb !important;
}

.header .btn-new {
    padding: 10px 30px !important;
}

.navbar {
    min-height: 45px !important;
}
.navbar-main > li {
    padding: 13px 0 13px !important;
}

.main-menu::before, .main-menu::after {
    height: 48px !important;
}
</style>
<div class="top-bar">
    <div class="container-fluid">
        <div class="row top-menu">
            <nav class="col-sm-offset-3 col-md-offset-4 col-lg-offset-4 col-sm-6 col-md-5 col-lg-5">
                <a href="#" class="hidden">LOGIN</a>
                <a href="#" class="hidden">REGISTER</a>
                <a href="#" class="hidden">WHY US</a>
            </nav>
            <nav class="text-right col-sm-3 col-md-3 col-lg-3">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </nav>

        </div><!-- Nav Top Menu -->
        <div class="row header">
            <div class="col-sm-3 col-md-3 col-lg-3" style="top: -25px;height: 75px;">
                <a href="index.php" id="logo">
                </a>
            </div>
            <div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-sm-8 col-md-8 col-lg-8">
                <div class="text-right header-padding">
                    <div class="h-block"><span>CALL US</span>044-48677050</div>
                    <div class="h-block"><span>EMAIL US</span>info@ssgaeseal.com</div>
                    <div class="h-block"><span>WORKING HOURS</span>Mon - Fri  10.00 AM - 6.00 PM</div>
                    <div class="h-block"><span>WORKING HOURS</span>Sat  10.00 AM - 4.00 PM</div>

                    <?php if(isset($_SESSION['exporteruserid'])){ ?>

                        <a class="btn-new btn-success" href="dashboard.php">MY ACCOUNT</a>

                        <a class="btn-new btn-success" href="logout.php">LOGOUT</a>

                        <ul class="hidden">
                            <li><i class="fa fa-phone"></i> Hotline: 044-48677050</li>
                            <li><a href="dashboard.php"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['exporterusername']; ?></a></li>
                            <li><a href="my-account.php"><i class="fa fa-asterisk"></i> My Account</a></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    <?php } else { ?>

                        <a class="btn-new btn-success" href="login.php">LOGIN</a>

                        <a class="btn-new btn-success" href="registration-terms.php">REGISTER</a>

                        <ul class="hidden">
                            <li><i class="fa fa-phone"></i> Hotline: 044-48677050</li>
                            <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                            <li><a href="registration-terms.php"><i class="fa fa-user"></i> Register</a></li>
                        </ul>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="css-menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default main-menu ">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-xs" href="#">Brand</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-main">
                            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="about-us.php">About us</a></li>
                            <li><a href="product.php">Products</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="contact-us.php">Contact Us</a></li>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>

