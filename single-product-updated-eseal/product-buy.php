<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
    header("Location: login.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";


$city_sql="SELECT * FROM `cities` where `city_status`=1";
$city_exe=mysql_query($city_sql);
$city_results = array();
while($row = mysql_fetch_assoc($city_exe)) {
    array_push($city_results, $row);
}

$state_sql="SELECT * FROM `states` where `state_status`=1";
$state_exe=mysql_query($state_sql);
$state_results = array();
while($row = mysql_fetch_assoc($state_exe)) {
    array_push($state_results, $row);
}

$country_sql="SELECT * FROM `countries` where `country_status`=1 AND `id`=99";
$country_exe=mysql_query($country_sql);
$country_results = array();
while($row1 = mysql_fetch_assoc($country_exe)) {
    array_push($country_results, $row1);
}

$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E Seal</title>
<link href="images/favicon.png" type="image/png" rel="shortcut icon">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
				autoplay:true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  600: {
                    items:2,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  1000: {
                    items: 2,
                    nav: true,
                    loop: false,
                    margin: 20,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  }
                }
              })
			  
			  $('.bxslider').bxSlider({
			mode: 'horizontal',
			moveSlides: 1,
			slideMargin: 40,
			infiniteLoop: true,
			slideWidth:550,
			minSlides:1,
			maxSlides:2,
			speed: 800,
			//auto:true,
		});
			  
			  
	$(window).scroll(function(){
  var sticky = $('.main-header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
			  
            });
</script>
</head>

<body>

<?php include "top_header.php"; ?>

<?php include "header.php"; ?>

<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>E Seal</h3>
</div>
</div>


<div class="products-category">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<h2>Seal Product</h2>
</div>


<div class="col-md-6 col-sm-6 col-xs-12">
<div class="common-item">
<div class="text">
    <h3><a href="javascript:void(0);">RFID Electronic Seal -  ₹ 299.00 </a></h3>
</div>
<div class="item">
<a href="javascript:void(0);"><img src="images/seal.jpg" alt="" title="" class="img-responsive"></a>
</div><!-- Item -->

</div><!-- Common Item -->
</div><!-- Column 6 -->


    <div class="col-md-6 col-sm-6 col-xs-12 freedom-list">



        <form name="buyform" id="buyform" action="#dobuy.php" method="post">
            <div class="row" style="padding-top:10px; ">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="form-group">
                         <select class="register-input" name="Product" id="Product" required >
                            <option value="1">RFID Electronic Seal -  ₹ 299.00</option>
                        </select>
                    </div>
                </div><!-- Inner Column -->

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                         <select class="register-input" name="Quantity" id="Quantity" required >
                            <option value="">Quantity</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                            <option value="90">90</option>
                            <option value="100">100</option>

                        </select>
                    </div>
                </div><!-- Inner Column -->
            </div>


        <div class="other-fields">
            <div class="row">



                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Name Of Company / Person *</label>
                        <input type="text" name="DeliveryName" id="DeliveryName" class="register-input" value="" placeholder="Name Of Company / Person" required />
                    </div>
                </div><!-- Inner Column -->
            </div><!-- Inner Row -->


            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Address *</label>
                        <textarea name="DeliveryAddress" id="DeliveryAddress" placeholder="Delivery Address" class="register-input" required></textarea>
                    </div>
                </div><!-- Inner Column -->

            </div><!-- Inner Row -->


            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Country *</label>
                        <select class="register-input" name="DeliveryCountry" id="DeliveryCountry" required >
                            <option value="">Select Country</option>
                            <?php
                            foreach($country_results as $key => $value){ ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div><!-- Inner Column -->


                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>State *</label>
                        <select class="register-input" name="DeliveryState" id="DeliveryState" required>
                            <option value="">Select State</option>
                            <?php
                            foreach($state_results as $key => $value){ ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['state_name']); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div><!-- Inner Column -->


                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>City *</label>
                        <select class="register-input" name="DeliveryCity" id="DeliveryCity" required>
                            <option value="">Select City</option>
                            <?php
                            foreach($city_results as $key => $value){ ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['city_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div><!-- Inner Column -->


                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Pincode *</label>
                        <input type="text" name="DeliveryPin" id="DeliveryPin" class="register-input" value="" required />
                    </div>
                </div><!-- Inner Column -->

            </div><!-- Inner Row -->




        </div>

        <div class="buy-now">
            <a href="javascript:void(0);">Buy Now</a>
        </div>

        </form>

    </div><!-- Column 6 -->

</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


<div class="welcome hidden">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<p>Sri Sai Ganesh Associates &reg; helps manufacturers with gaining full control of their supply chain.</p>
</div><!-- Column 12 -->
</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Welcome -->


<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

</body>
</html>
