<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
    header("Location: login.php");
}

include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];


$userinfo_sql="SELECT * FROM `exporter_info` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);
$userinfo=mysql_fetch_array($userinfo_exe);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Change Password</title>
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



<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>Change Password</h3>
</div>
</div>


<div class="dashboard">
<div class="container">
<div class="row">

<div class="col-md-3 col-sm-3 col-xs-12">
<?php include "sidebar.php"; ?>
</div><!--Column 6-->

<div class="col-md-9 col-sm-9 col-xs-12">
<div class="my-account">
<h3><i class="fa fa-unlock" aria-hidden="true"></i> Change Password</h3>

    <?php if(isset($_REQUEST['succ'])) { ?>
        <p style="color:green;font-weight:bold"> Your Account Password Changed Successfully!</p><br/>
    <?php } ?>

    <?php if(isset($_REQUEST['err'])) { ?>
        <p style="color:red;font-weight:bold"> Your Account Password Not Changed / Invalid Current Password.</p><br/>
    <?php } ?>

<h4>Change Your Account Password</h4>

<form name="passwordform" id="passwordform" action="dopassword.php" method="post">
<div class="form-group row">
<div class="col-md-3 col-sm-3 col-xs-12">
<label>Old Password *</label>
</div>
<div class="col-md-9 col-sm-9 col-xs-12">
<input type="password" name="currentpassword" id="currentpassword" placeholder="Old Password" class="account-input" />
</div>
</div>


<div class="form-group row">
<div class="col-md-3 col-sm-3 col-xs-12">
<label>New Password *</label>
</div>
<div class="col-md-9 col-sm-9 col-xs-12">
<input type="password" name="password" id="password" placeholder="New Password" class="account-input" />
</div>
</div>


<div class="form-group row">
<div class="col-md-3 col-sm-3 col-xs-12">
<label>Confirm Password *</label>
</div>
<div class="col-md-9 col-sm-9 col-xs-12">
<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" class="account-input" />
</div>
</div>


<div class="form-group row">
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="reset" value="Back" class="account-submit hidden" />
</div>
<div class="col-md-6 col-sm-6 col-xs-12 text-right">
<input type="submit" name="passwordupdate" value="Submit" class="account-submit" />
</div>
</div>

</form>

</div><!--My Account-->
</div><!--Column 9-->

</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


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
        $("form#passwordform").validate({
            // Specify validation rules
            rules: {
                currentpassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 15,
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 15,
                },
                confirmpassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 15,
                    equalTo: "#password"
                },
            },
            // Specify validation error messages
            messages: {
                currentpassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    maxlength: "Your password must be at maximum 15 characters long"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    maxlength: "Your password must be at maximum 15 characters long"
                },
                confirmpassword: {
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
<style>
    label.error { color: red; }
</style>
</body>
</html>
