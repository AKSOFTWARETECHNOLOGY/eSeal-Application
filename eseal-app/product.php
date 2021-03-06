<?php session_start();
ob_start();

include "config.php";

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product - SSGA</title>
    <link href="images/favicon.png" type="image/png" rel="shortcut icon">
    <link href="css/style-inner.css" type="text/css" rel="stylesheet">

    <link href="ssga/css/style.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="ssga/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="ssga/js/bootstrap.min.js"></script>

</head>

<body>

<?php //include "top_header.php"; ?>

<?php //include "header.php"; ?>

<?php include "header-new.php"; ?>

<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>E-Seal</h3>
</div>
</div>


<div class="products-category">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<h2>E-Seal Product</h2>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 freedom-list">
<ul>
<li><i class="fa fa-bullseye"></i>Freedom - avail self-sealing of cargo at your premises</li>
<li><i class="fa fa-crosshairs" aria-hidden="true"></i>Reduce risk of pilferage and theft</li>
<li><i class="fa fa-file-text-o" aria-hidden="true"></i>View your shipment data anytime</li>
<li><i class="fa fa-binoculars" aria-hidden="true"></i>Track your shipment from your business premises to port gate</li>
<li><i class="fa fa-area-chart" aria-hidden="true"></i>Free analytics to support your supply chain management Know more</li>
</ul>

</div><!-- Column 6 -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="common-item">
<div class="text">
    <h3><a href="javascript:void(0);">RFID Electronic Seal </a></h3>
</div>
<div class="item">
<a href="javascript:void(0);"><img src="images/seal.jpg" alt="" title="" class="img-responsive"></a>
<div class="btn-group hidden">
<ul>
<li><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i> Add to cart</a></li>
<li><a href="javascript:void(0);"><i class="fa fa-heart"></i> Wishlist</a></li>
</ul>
</div>
</div><!-- Item -->
<div class="buy-now">
    <?php if(isset($_SESSION['exporteruserid'])){ ?>
        <a href="product-buy.php">Buy Now</a>
    <?php } else { ?>
        <a href="login.php">Buy Now</a>
    <?php } ?>
</div>
</div><!-- Common Item -->
</div><!-- Column 6 -->


</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->

<div class="welcome">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <iframe src="e-seal-specification.pdf" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div>



<?php //include "welcome.php"; ?>

<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

</body>
</html>
