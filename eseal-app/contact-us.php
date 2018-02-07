<?php session_start();
ob_start();

include "config.php";

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - SSGA</title>
    <link href="images/favicon.png" type="image/png" rel="shortcut icon">
    <link href="css/style-inner.css" type="text/css" rel="stylesheet">

    <link href="ssga/css/style.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="ssga/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="ssga/js/bootstrap.min.js"></script>

    <style> .Contact-Us {
            width: 100%;
            float: left;
            background: #f8f3f7;
            padding: 30px 0;
        }
    </style>
</head>

<body>

<?php //include "top_header.php"; ?>

<?php //include "header.php"; ?>

<?php include "header-new.php"; ?>


<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>Contact Us</h3>
</div>
</div>


<div class="Contact-Us">
<div class="container">
<div class="row">
<h3>Contact Us</h3>
<br/>
<div class="col-md-6 col-sm-6 col-xs-12 contact-form">
<form action="" method="post" >
<div class="form-group">
<label>First Name (*)</label>
<div class="col-md-12 col-sm-12 col-xs-12"><input type="text" name="fname" id="fname" placeholder="Last Name" class="contact-input"></div>
</div>


<div class="form-group">
<label>Last Name (*)</label>
<div class="col-md-12 col-sm-12 col-xs-12"><input type="text" name="fname" id="fname" placeholder="Last Name" class="contact-input"></div>
</div>


<div class="form-group">
<label>Email (*)</label>
<div class="col-md-12 col-sm-12 col-xs-12"><input type="text" name="email" id="email" placeholder="Email" class="contact-input"></div>
</div>

<div class="form-group">
<label>Phone no  (*)</label>
<div class="col-md-12 col-sm-12 col-xs-12"><input type="text" name="mobileno" id="mobileno" placeholder="Cell no" class="contact-input"></div>
</div>


<div class="form-group">
<label>Additional Information </label>
<div class="col-md-12 col-sm-12 col-xs-12"><textarea placeholder="Additional Information" id="msg" name="msg" class="contact-input"></textarea></div>
</div>


<div class="form-group">
<div class="col-md-12 col-sm-12 col-xs-12"><input type="submit" value="Submit" class="contact-submit"></div>
</div>
</form>
 
</div><!-- Column 6 -->



<div class="col-md-6 col-sm-6 col-xs-12 contact">
    <p><b>SRI SAI GANESH ASSOCIATES,</b></p>

    <p>1-D First Floor, AM Tower, Old No: 239, New No: 36, 
    <p>Angappanaikken Street, Mannady,
    <p> Chennai - 600 001</p>
    <p>Phone: 044-48677050</p>
<!--
<p><b>Sri Sai Ganesh Associates</b></p>
<p>1-D First Floor, AM Tower,</p> 
<p>Old No: 239, New No: 36, </p>
<p>Angappanaikken Street, Mannady, </p>
<p>Chennai - 600 0001</p>
-->
<p>info@ssgaeseal.com</p>


 

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7772.172458474217!2d80.28481417440369!3d13.093721413103285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f4ff2f07cf9%3A0x65f3c0b603a9ccb2!2sMannady%2C+George+Town%2C+Chennai%2C+Tamil+Nadu+600001!5e0!3m2!1sen!2sin!4v1512851437313" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
   <!--
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.0356191389897!2d80.17700885145436!3d13.075644402971957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526157089399f5%3A0x353a3700b48c2cae!2sSri+Sai+Ganesh+Associates!5e0!3m2!1sen!2sin!4v1512386830635" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    -->
</div>
</div><!-- Column 6 -->





</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>


</body>
</html>
