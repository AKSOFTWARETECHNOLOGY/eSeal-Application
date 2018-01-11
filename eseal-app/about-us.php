<?php session_start();
ob_start();

include "config.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Us</title>
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
<h3>About Us</h3>
</div>
</div>



<div class="products-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2>About Us</h2>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 freedom-list">
                <ul>
                    <li style="font-size: 15px;line-height: 30px;text-align: justify;">
                        Head quartered in Thanjavur District, Tamil Nadu, SSG Groupis a major player in Tamil Nadu and the flagship company . With a rich heritage and an exhaustive and diverse portfolio of successfully completed projects across industry sectors, the company is poised for the next era of growth. The key factors to its robust and stable growth are its client focus, its leadership, the adoption of the latest technology and its work force orientation. SSG Group brings a host of capabilities to major  projects through an integrated approach that spans the life cycle of infrastructure, Education and Training, Media and Entertainment and Logistic Solutions to professional & support services are been Headed by Mr.Sridharan, along with the energetic team of professionals.
                    </li>
                </ul>

            </div><!-- Column 6 -->

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="common-item">
                    <div class="item">
                        <a href="javascript:void(0);"><img src="images/seal.jpg" alt="" title="" class="img-responsive"></a>
                    </div><!-- Item -->

                </div><!-- Common Item -->
            </div><!-- Column 6 -->


        </div><!-- Row -->
    </div><!-- Container Fluid -->
</div><!-- Product category -->

<div class="home-about grey-bg hidden">
<div class="container">
<div class="row web-inner-top">
<h3>About Us</h3>
<br/>
<div class="col-md-6 col-sm-6 col-xs-12 about-us">

<p>Head quartered in Thanjavur District, Tamil Nadu, SSG Groupis a major player in Tamil Nadu and the flagship company . With a rich heritage and an exhaustive and diverse portfolio of successfully completed projects across industry sectors, the company is poised for the next era of growth. The key factors to its robust and stable growth are its client focus, its leadership, the adoption of the latest technology and its work force orientation. SSG Group brings a host of capabilities to major  projects through an integrated approach that spans the life cycle of infrastructure, Education and Training, Media and Entertainment and Logistic Solutions to professional & support services are been Headed by Mr.Sridharan, along with the energetic team of professionals.</p>

</div>


<div class="col-md-6 col-sm-6 col-xs-12 abt-imgX">
    <br/><br/>
<img src="images/seal.jpg" alt="" title="" class="img-responsive">
</div>
</div>

<!--<div class="row web-inner-top">
<div class="col-md-3 col-sm-3 col-xs-12 abt-img">
<img src="images/eseal1.jpg" alt="" title="" class="img-responsive img-circle">
</div>

<div class="col-md-9 col-sm-9 col-xs-12 about-us">
<p>To our credit we sold the first official mobile handset in India in 1995 and have since been instrumental in evolution of mobile industry in the country. In 2015, we entered into a joint venture with Wistron Corporation of Taiwan to set up world class manufacturing facilities for Smartphone and Smart devices in India under Make in India initiative. Optiemus is also the brand licensee for BlackBerry Smartphones for Indian subcontinent and under the agreement manufactures, distributes, markets & provides post sales services. The Group has an extensive presence in telecom retail business with stores across India under the Mobility World and Univercell brands. The group’s flagship company, Optiemus Infracom is listed across all the major stock exchanges in the country, including BSE, NSE.</p>
</div>
</div>-->

<!--<div class="row web-inner-top">
<div class="col-md-9 col-sm-9 col-xs-12 about-us">
<p>Optiemus Telematics Pvt. Ltd marks the entry of Sri Sai Ganesh Associates into the field of telematics, bringing to this industry its core philosophy of always introducing world class technology with speed and scalability. Optiemus Telematics welcomes its customers to a new era in B2B transactions with end to end digital experience starting from online procurement to easy to use cloud hosted applications, all customized to provide you with agility, visibility and security in your logistics operations.</p>
</div>
<div class="col-md-3 col-sm-3 col-xs-12 abt-img">
<img src="images/eseal1.jpg" alt="" title="" class="img-responsive img-circle">
</div>

</div>--><!-- Row -->
</div><!-- Container -->
</div><!-- Home About -->







<?php //include "welcome.php"; ?>

<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

 
</body>
</html>
