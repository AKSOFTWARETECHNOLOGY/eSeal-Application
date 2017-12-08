<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Registration </title>
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
<h3>User Registration</h3>
</div>
</div>


<div class="contact-us">
<div class="container">
<div class="row">




<form action="dashboard.php" method="post">
<div class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3 address">
<div class="account-register">

<div class="form-group row">
<label>Name of Exporter*</label>
<input type="text" name="name" class="register-input" value="" placeholder="Name of Exporter">
<p>(please fill in the name as it appears in official IEC records)</p>
</div>


<p>Address(as per IEC records)</p>
<div class="other-fields">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Country *</label>
<input type="text" name="dob" id="dpicker" class="register-input " value="" />
</div>
</div><!-- Inner Column -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Name Of Contact Person *</label>
<input type="text" name="phoneno" class="register-input" value="">
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->


<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Address 1 *</label>
<textarea placeholder="Address 1" class="register-input "></textarea>
</div>
</div><!-- Inner Column -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Address 2 *</label>
<textarea placeholder="Address 2" class="register-input "></textarea>
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->


<div class="row">

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>Pincode *</label>
<input type="text" name="pin" class="register-input" value="">
</div>
</div><!-- Inner Column -->

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>City *</label>
<input type="text" name="City" class="register-input" value="">
</div>
</div><!-- Inner Column -->


<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>State *</label>
<select class="register-input">
<option value="">(Select One)</option>
<option value="HR">Haryana - 06</option>
<option value="RJ">Rajasthan - 08</option>
<option value="PB">Punjab - 03</option>
<option value="DL">NCT of Delhi# - 07</option>
<option value="UP">Uttar Pradesh - 09</option>
<option value="BR">Bihar - 10</option>
<option value="MP">Madhya Pradesh - 23</option>
<option value="GJ">Gujarat - 24</option>
<option value="UT">Uttrakhand - 05</option>
<option value="JK">Jammu &amp; Kashmir - 01</option>
<option value="HP">Himachal Pradesh - 02</option>
<option value="AN">Andaman &amp; Nicobar Islands# - 35</option>
<option value="AP">Andhra Pradesh - 37</option>
<option value="AR">Arunachal Pradesh - 12</option>
<option value="AS">Assam - 18</option>
<option value="CH">Chandigarh# - 04</option>
<option value="CT">Chhattisgarh - 22</option>
<option value="DN">Dadra &amp; Nagar Haveli# - 26</option>
<option value="DD">Daman &amp; Diu# - 25</option>
<option value="GA">Goa - 30</option>
<option value="JH">Jharkhand - 20</option>
<option value="KA">Karnataka - 29</option>
<option value="LD">Lakshadweep# - 31</option>
<option value="MH">Maharashtra - 27</option>
<option value="MN">Manipur - 14</option>
<option value="ML">Meghalaya - 17</option>
<option value="MZ">Mizoram - 15</option>
<option value="NL">Nagaland - 13</option>
<option value="OR">Orissa - 21</option>
<option value="PY">Puducherry# - 34</option>
<option value="SK">Sikkim - 11</option>
<option value="TN">Tamil Nadu - 33</option>
<option value="TG">Telangana - 36</option>
<option value="KL">Kerala - 32</option>
<option value="TR">Tripura - 16</option>
<option value="WB">West Bengal - 19</option>
</select>
</div>
</div><!-- Inner Column -->

</div><!-- Inner Row -->



<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Landline Number *</label>
<input type="text" name="dob" id="dpicker" class="register-input " value="" />
</div>
</div><!-- Inner Column -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>GSTIN *</label>
<input type="text" name="phoneno" class="register-input" value="">
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->
</div>






<div class="form-group">
<label>Email Id*</label>
<input type="text" name="email" class="register-input" value="">
<span>(This will become your default registered email)</span>
</div>


<div class="form-group">
<label>Password*</label>
<input type="password" name="password" class="register-input" value="">
<span>( The password should be atleast 6 charaters long and contain one capital letter and one special character )</span>
</div>

<div class="form-group">
<label>Mobile No.*</label>
<input type="text" name="confirmpassword" class="register-input" value="">
</div>

<div class="form-group">
<label>IEC Code.*</label>
<input type="text" name="confirmpassword" class="register-input" value="">
</div>

<div class="declare">
<h4>We declare that we are entitled for self-sealing facility as per circular 26/2017 and 36/2017 and belong to one of the following permitted categories:</h4>
<ul>
<li>exporters newly granted permission for self-sealing;</li>
<li>exporters who were already operating under self-sealing procedure;</li>
<li>exporters who were permitted factory stuffing facility; or</li>
<li>Authorized Economic Operator</li>
</ul>
</div>

<div class="form-group last-otp">
<input type="submit" name="register" value="Submit">
</div>


</div>
</div>
</form>





</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->




<?php include "slider.php"; ?>

<?php include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

</body>
</html>
