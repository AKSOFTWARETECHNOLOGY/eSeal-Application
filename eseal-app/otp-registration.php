<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OTP Registration</title>
<link href="images/favicon.png" type="image/png" rel="shortcut icon">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
<link href="css/jquery.accordion.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="js/jquery.accordion.js" type="text/javascript"></script>
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


        $('#only-one [data-accordion]').accordion();

        $('#multiple [data-accordion]').accordion({
          singleOpen: false
        });

        $('#single[data-accordion]').accordion({
          transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
          transitionSpeed: 200
        });
      
			  
            });
</script>
</head>

<body>

<?php include "top_header.php"; ?>

<?php include "header.php"; ?>



<div class="home-about-banner">
<div class="home-about-banner-overlay">
<h3>OTP Registration</h3>
</div>
</div>


<div class="contact-us">
<div class="container">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3 enter">
<p><b>Please enter the following details and we will send you a 6 digit OTP as your login password.</b></p>
<div class="reg-otp">
<form action="otp-number-registration.php" method="post">
<div class="form-group">
<input type="text" name="text" placeholder="IEC Number" class="otp-input">
<input type="text" name="text" placeholder="OTP Number" class="otp-input">
<span>( This will become your registered mobile number. It will be used to communicate with you and verify your identity when you call helpdesk )</span>
<div class="otp-form">
<input type="submit" value="Send OTP" name="otp" class="otp-submit">
</div>
</div>
 </form>
 </div>
</div><!-- Column 6 -->






</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->





<?php include "slider.php"; ?>

<?php include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>


</body>
</html>
