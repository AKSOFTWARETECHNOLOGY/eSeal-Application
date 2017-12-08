<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Order History</title>
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
<h3>Order History</h3>
</div>
</div>


<div class="dashboard">
<div class="container">
<div class="row">

<div class="col-md-3 col-sm-3 col-xs-12">
<?php include "sidebar.php"; ?>
</div><!--Column 6-->

<div class="col-md-9 col-sm-9 col-xs-12">
<div class="order-history">
<div class="table-responsive">
<table class="table">
<thead>
<th>Order ID</th>
<th>Customer</th>
<th>No. of Products</th>
<th>Status</th>
<th>Total</th>
<th>Date Added</th>
<th>View</th>
</thead>
<tbody>
<tr>
<td>2</td>
<td>Name</td>
<td>1</td>
<td>Pending</td>
<td>Rs.1000.00</td>
<td>7/12/2017</td>
<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
</tr>
<tr>
<td>2</td>
<td>Name</td>
<td>1</td>
<td>Pending</td>
<td>Rs.1000.00</td>
<td>7/12/2017</td>
<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
</tr>
<tr>
<td>2</td>
<td>Name</td>
<td>1</td>
<td>Pending</td>
<td>Rs.1000.00</td>
<td>7/12/2017</td>
<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
</tr>
<tr>
<td>2</td>
<td>Name</td>
<td>1</td>
<td>Pending</td>
<td>Rs.1000.00</td>
<td>7/12/2017</td>
<td><a href="javascript:void(0);"><i class="fa fa-eye"></i></a></td>
</tr>
</tbody>
</table>
</div><!--Table Responsive-->
<div class="con-btn">
<a href="javascript:void(0);">Continue</a>
</div><!--Submit Btn-->
</div><!--Order History-->
</div><!-- Column 9  -->
</div><!-- Row  -->
</div><!-- Container -->
</div><!-- Dash Board -->


<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>


</body>
</html>
