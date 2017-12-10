<?php session_start();
ob_start();

if(isset($_SESSION['exporteruserid']))
{
    header("Location: dashboard.php");
}

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
?>
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




<form name="registerform" id="registerform" action="doregister.php" method="post">
<div class="col-md-12 col-sm-12 col-xs-12 address">
<div class="account-register">

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label>Name of Exporter*</label>
        <input type="text" name="exporterName" class="register-input" value="" placeholder="Name of Exporter" required />
        <p>(please fill in the name as it appears in official IEC records)</p>
    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label>IEC Code.*</label>
        <input type="text" name="icecode" class="register-input" value="" placeholder="IEC Code" required />
    </div>
</div>
</div>

<p>Address(as per IEC records)</p>
<div class="other-fields">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Country *</label>
<select class="register-input" name="countryId" id="countryId" required >
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
<label>Name Of Contact Person *</label>
<input type="text" name="personName" class="register-input" value="" placeholder="Name Of Contact Person" required />
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->


<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="form-group">
<label>Address *</label>
<textarea name="address" id="address" placeholder="Address" class="register-input" required></textarea>
</div>
</div><!-- Inner Column -->

</div><!-- Inner Row -->


<div class="row">

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>Pincode *</label>
<input type="text" name="pincode" id="pincode" class="register-input" value="" required />
</div>
</div><!-- Inner Column -->

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>City *</label>
<select class="register-input" name="cityId" id="cityId" required>
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


<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>State *</label>


<select class="register-input" name="state" id="state" required>
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

</div><!-- Inner Row -->



<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Pan Number </label>
<input type="text" name="panNumber" id="panNumber" class="register-input " value="" />
</div>
</div><!-- Inner Column -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>GSTIN </label>
<input type="text" name="gstin" id="gstin" class="register-input" value="" />
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->
</div>





<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Email Id*</label>
<input type="text" name="email" class="register-input" value="" required />
<span>(This will become your default registered email)</span>
</div>
</div><!-- Inner Column -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Password*</label>
<input type="password" name="password" class="register-input" value="" required />
<span>( The password should be atleast 5 charaters long )</span>
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Mobile No.*</label>
<input type="text" name="mobile" id="mobile" class="register-input" value="" required />
</div>
</div><!-- Inner Column -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Landline Number *</label>
<input type="text" name="telephone" id="telephone" class="register-input " value="" required />
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->

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




<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<script>
    // Wait for the DOM to be ready
    $(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        });

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form#registerform").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                role: "required",
                exporterName: {
                    required: true,
                    lettersonly: true
                },
                icecode: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                personName: {
                    required: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 15,
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 11
                },
                telephone: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 11
                },
                pincode: "required",
                cityId: "required",
                state: "required",
                countryId: "required",
                address: "required",
            },
            // Specify validation error messages
            messages: {
                role: "Please choose role",
                exporterName: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                icecode: {
                    required: "Please provide a valid ICE Code",
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 10 characters long"
                },
                personName: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                email: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    maxlength: "Your password must be at maximum 15 characters long"
                },
                mobile: {
                    required: "Please provide a valid mobile number",
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 11 characters long"
                },
                telephone: {
                    required: "Please provide a valid mobile number",
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 11 characters long"
                },
                pincode: "Please enter your Pincode",
                cityId: "Please choose your City",
                state: "Please choose your State",
                countryId: "Please choose your Country",
                address: "Please enter your Address",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<style>
    label.error { color: red; }
</style>
</body>
</html>
