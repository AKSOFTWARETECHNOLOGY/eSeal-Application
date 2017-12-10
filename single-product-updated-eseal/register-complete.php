<?php session_start();
ob_start();

if(isset($_SESSION['exporteruserid']))
{
    header("Location: dashboard.php");
}

include "config.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
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
<h3>Login or Create an Account</h3>
</div>
</div>


<div class="contact-us">
<div class="container">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="account-login">
<h3>New Customers</h3>

<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more</p>


<a href="registration-terms.php"><i class="fa fa-user"></i> Create an Account</a>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="account-sign">
    <?php if(isset($_REQUEST['success'])) { ?>
        <p style="color:green;font-weight:bold"> Your Account Activated Successfully! You can login now.</p>
    <?php } ?>

    <?php if(isset($_REQUEST['err'])) { ?>
        <p style="color:red;font-weight:bold"> Invalid Login Details / Your Account not Activated.</p>
    <?php } ?>
<h3>Registered Customers</h3>
<p>If you have an account with us, please log in.</p>


<form name="loginform" id="loginform" action="dologin.php" method="post">
<div class="modal-body">

<div class="form-group row">
<label>Email Id*</label>
<input type="text" name="email" value="" required />
</div>

<div class="form-group row">
<label>Password*</label>
<input type="password" name="password" value=""  required />
</div>

<div class="form-group row">
<span><input type="submit" name="login" value="Login" class="account-sign-submit" /></span>
<!--<button type="button" name="login"><i class="fa fa-lock"></i>Login</button>-->
<a href="javascript:void(0);">Forgot Your Password ?</a>
</div>

</div>
</form>
</div>
</div>





</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


<?php include "slider.php"; ?>

<?php include "testimonial.php"; ?>

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
        $("form#loginform").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                role: "required",
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
            },
            // Specify validation error messages
            messages: {
                email: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    maxlength: "Your password must be at maximum 15 characters long"
                },
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>
