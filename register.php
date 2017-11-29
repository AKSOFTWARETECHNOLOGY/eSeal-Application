<?php session_start();
ob_start();

if(isset($_SESSION['nextpubuserid']))
{
	header("Location: dashboard.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";

$city_sql="SELECT * FROM `cities` WHERE `country`='99'";
$city_exe=mysql_query($city_sql);	

?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>NextPUB |Register Here</title>	

		<meta name="keywords" content="Nextpub" />
		<meta name="description" content="Where content owners meet publishers">
		<meta name="author" content="zudhire.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.min.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">
		<link rel="stylesheet" href="vendor/circle-flip-slideshow/css/component.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>

		<div class="body">
			<header id="header" class="header-narrow" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 1, "stickySetTop": "1"}'>
				<div class="header-body">
					<div class="header-container container">
						<?php include "header-menu.php"; ?>
					</div>
				</div>
			</header>

			<div role="main" class="main">
                
                
				<section class="section section-primary">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1><strong>Register </strong>with us.</h1>
								<p class="lead">NextPUB is the platform for New age publishing stakeholders.</p>
								
							</div>
							
						</div>
					</div>
				</section>
                
                
    
				<div class="container">
                
                    <div class="row">
                    
                        <div class="col-sm-12">
                            <h2>Register</h2> 
							<div class=""> Already Member? Click Here <a href="login.php">LOGIN</a> </div>
							
							
								<div class="panel-body">
									<form class="form-horizontal form-bordered" id="registerform" method="post" action="doregister.php">
									
										<div class="form-group">
											<label class="col-md-3 control-label" for="userRole">User Type</label>
											<div class="col-md-6">
												<select class="form-control" id="userRole" name="role" required >
													<option value="" selected>Choose Role</option>
													<option value="2">Writer</option>
													<option value="7">Publisher</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userName">Name</label>
											<div class="col-md-6">
												<input type="text" class="form-control" id="userName" name="name" required />
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userEmail">Email</label>
											<div class="col-md-6">
												<input type="email" class="form-control" id="userEmail" name="email" required />
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userPassword">Password</label>
											<div class="col-md-6">
												<input type="password" class="form-control" id="userPassword" name="password" required />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userConfirmPassword">Confirm Password</label>
											<div class="col-md-6">
												<input type="password" class="form-control" id="userConfirmPassword" name="confirmpassword" required />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userName">Mobile</label>
											<div class="col-md-6">
												<input type="number" class="form-control" id="userMoile" name="mobile" required />
												
												
											</div>
										</div>										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userCuty">City</label>
											<div class="col-md-6">
												<select class="form-control" id="userCity" name="city" required >
													<option value="" selected>Choose City</option>
													<?php while($city_fet=@mysql_fetch_array($city_exe)) { ?>
													<option value="<?php echo $city_fet['id']; ?>"><?php echo $city_fet['city_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userPassword"></label>
											<div class="col-md-6">
												<input type="checkbox" name="terms" class="form-controlX" value="1" required /> Accept Terms and Conditions
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userPassword"></label>
											<div class="col-md-6">
												<button type="submit" name="register" class="btn btn-success mr-xs mb-sm">Register Now</button>
											</div>
										</div>
									</form>
								</div>
						 	
                            
                            		

                        
                        </div>
                    
                    </div>
                
                </div>
			
                
 

				
	
			
			</div><!-- main ends-->

			<footer id="footer">
				<?php include "footer-menu.php"; ?>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/common/common.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/vide.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
		<script src="js/views/view.home.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		
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
	  name: {
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
	  confirmpassword: {
		required: true,
        minlength: 5,
		maxlength: 15,
		equalTo: "#userPassword"
	  },
	  mobile: {
		required: true,
		number: true,
        minlength: 10,
		maxlength: 11
	  },
	  city: "required",
    },
    // Specify validation error messages
    messages: {
      role: "Please choose role",
	  name: {
        required: "Please enter your name",
        lettersonly: "Your name must be characters"
      },
      email: "Please enter a valid email address",
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
	  mobile: {
        required: "Please provide a valid mobile number",
        minlength: "Your mobile number must be 10 characters long",
		maxlength: "Your mobile number must be 11 characters long"
      },
      city: "Please choose your city",
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
