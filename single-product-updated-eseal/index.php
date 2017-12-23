<?php session_start();
ob_start();

include "config.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome to Sri Sai Ganesh Associates</title>
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
			moveSlides:1,
			slideMargin: 40,
			infiniteLoop: true,
			minSlides:1,
			maxSlides: 1,
			speed: 2000,
			auto:true,
		});
			  
			  
	$(window).scroll(function(){
  var sticky = $('.main-header'),
      scroll = $(window).scrollTop();

  if (scroll >= 500) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
			  
            });
</script>
</head>

<body>

<?php //include "top_header.php"; ?>

<?php include "header.php"; ?>

<?php include "banner.php"; ?>

<div class="home-about hidden">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 about">
<h3>About Us</h3>
<p>Head quartered in Thanjavur District, Tamil Nadu, SSG Groupis a major player in Tamil Nadu and the flagship company . With a rich heritage and an exhaustive and diverse portfolio of successfully completed projects across industry sectors, the company is poised for the next era of growth. The key factors to its robust and stable growth are its client focus, its leadership, the adoption of the latest technology and its work force orientation. SSG Group brings a host of capabilities to major  projects through an integrated approach that spans the life cycle of infrastructure, Education and Training, Media and Entertainment and Logistic Solutions to professional & support services are been Headed by Mr.Sridharan, along with the energetic team of professionals.</p>
<div class="read-more"><a href="about-us.php">Read More</a></div>
</div><!-- Column 12 -->



</div><!-- Row -->
</div><!-- Container -->
</div><!-- Home About -->


<div class="products-category hidden">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<h2>Seal Product</h2>
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

<div class="col-md-6 col-sm-6 col-xs-12 hidden">
<div class="common-item">
<div class="text">
<h3><a href="javascript:void(0);">RFID Electronic Seal -  ₹ 299.00 </a></h3>
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





<?php include "welcome.php"; ?>

<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

</body>
</html>
