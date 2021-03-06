<style>
    .logo img {
        padding: 0px !important;
        width: 330px !important;
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
        color: #228dcb;
    }
    .navbar-default .navbar-nav>li>a {
        color: #FFFFFF;
    }
    .mail-link ul li {
        color: #FFFFFF;
    }
    .mail-link ul li a {
        color: #FFFFFF;
    }

</style>
<div id="header" class="main-header" style="padding: 5px 0;    background: #228dcb !important;">
<div class="container-fluid">
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12 logo">
<h3><a href="dashboard.php">
        <img src="images/logo-white.png" alt="Sri Sai Ganesh Associates" title="Sri Sai Ganesh Associates" class="img-responsive">
    </a>
</h3>
</div>
<div class="col-md-8 col-sm-8 col-xs-12">

    <div class="top-barX" style="padding-bottom: 0px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="mail-link mail-rightX">

                        <?php if(isset($_SESSION['exporteruserid'])){ ?>
                            <ul>
                                <li><i class="fa fa-phone"></i> Hotline: 044-48677050</li>
                                <li><a href="dashboard.php"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['exporterusername']; ?></a></li>
                                <li><a href="my-account.php"><i class="fa fa-asterisk"></i> My Account</a></li>
                                <li><a href="eseal-procedure.php"><i class="fa fa-dashboard"></i> E-Seal Procedure</a></li>
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



<nav class="navbar navbar-default hidden">
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
        <li><a href="eseal-procedure.php">E-Seal Procedure</a></li>
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

