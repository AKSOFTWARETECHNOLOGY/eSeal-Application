<?php session_start();
ob_start();

include "config.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Return &amp; Refund Policy</title>
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
<h3>Return &amp; Refund Policy</h3>
</div>
</div>


<div class="terms grey-bg">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <h3>Return &amp; Refund Policy</h3>
    <br/>
<p>Thanks for shopping at My Site <a href="www.ssgaeseal.com">www.ssgaeseal.com</a> </p>
<p>If you are not entirely satisfied with your purchase, we're here to help.</p>
<h2>Returns</h2>
<p>You have 30 (change this) calendar days to return an item from the date you received it</p>
<p>To be eligible for a return, your item must be unused and in the same condition that you received it.</p>
<p>Your item must be in the original packaging.</p>
<p>Your item needs to have the receipt or proof of purchase.</p>
<h2>Refunds</h2>
<p>Once we receive your item, we will inspect it and notify you that we have received your returned item. We will immediately notify you on the status of your refund after inspecting the item.</p>
<p>If your return is approved, we will initiate a refund to your credit card (or original method of payment).</p>
<p>You will receive the credit within a certain amount of days, depending on your card issuer's policies.</p>
<h2>Shipping</h2>
<p>You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non­refundable.</p>
<p>If you receive a refund, the cost of return shipping will be deducted from your refund.</p>
<h2>Non- Refundable/ Non- returnable Products / Services:</h2>
<p>Certain Products / Services are non- returnable and Non Refundable : such products and services cannot be claimed under this refund / return policy.</p>
<h2>Contact Us</h2>
<p><strong>If you have any questions on how to return your item to us, contact us.</strong></p>
<p><strong>Email Id :</strong> ssgassociates2015@gmail.com</p>
<p><strong>Contact No :</strong> (+91) 94880 15119, (+91) 88256 23258.</p>
<p><b>Postal Address : </b>No.44, MIG, G1/5 Marutham Enclave,</p>
<p>6th Main Road, Mogappair ERI Scheme,</p>
<p>Chennai - 600 0037</p>
</div><!-- Column 12 -->
</div><!-- Row -->
</div><!-- Container -->
</div><!-- Home About -->



<?php //include "welcome.php"; ?>

<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

</body>
</html>
