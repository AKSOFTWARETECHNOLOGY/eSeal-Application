<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact Us</title>
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
<h3>Contact Us</h3>
</div>
</div>


<div class="contact-us">
<div class="container">
<div class="row">

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
<p><b>Sri Sai Ganesh Associates</b></p>
<p>No.44, MIG, G1/5 Marutham Enclave,</p>
<p>6th Main Road, Mogappair ERI Scheme,</p>
<p>Chennai - 600 0037</p>
<p>ssgassociates2015@gmail.com</p>

 

<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.0356191389897!2d80.17700885145436!3d13.075644402971957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526157089399f5%3A0x353a3700b48c2cae!2sSri+Sai+Ganesh+Associates!5e0!3m2!1sen!2sin!4v1512386830635" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
