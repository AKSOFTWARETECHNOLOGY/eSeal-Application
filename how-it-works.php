<?php session_start();
ob_start();
/*
if(!isset($_SESSION['nextpubuserid']))
{
	header("Location: login.php");
}
*/
/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";
?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>NextPUB | Where content owners meet publishers</title>	

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
                
                
				<section class="section section-primary mt-none">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1 class="mb-none">How it works</h1>
								
								
							</div>
							
						</div>
					</div>
				</section>
                
                
    
								<div class="container">
                
                    <div class="row">
                    
                        <div class="col-sm-12">
                            <h2 class="center" style="font-size: 32px; line-height: 1.5em; letter-spacing: 1;">NextPUB is the platform for Authors and Publishers to find each other. Authors looking for publishing services can furnish their works here and get better exposure. While Publishers are here to find the suitable content for them to do business.</h2>
                             <hr class="tall">
                  </div>
                    
                    </div>
                    
                   
                    
             		<div class="featured-boxes featured-boxes-style-8">
						<div class="row">
					
							<div class="col-md-6">
                                
                                <h2>For Authors</h2>
                                
								<div class="featured-box featured-box-secondary featured-box-text-left">
									<div class="box-content">
										<div class="row">
											<div class="col-md-12">
												<i class="icon-featured fa  pull-left mr-lg">1</i> <h2>Register as Author</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<p>By registering as an author, NextPUB powers you with the following features. </p>
                                                <ul>
                                                <li>Add your complete profile.</li>
                                                    <li>Upload your content</li>
                                                    <li>Add profile photo</li>
                                                    <li>Add contact details.</li>
                                                </ul>
												
											</div>
										</div>
									</div>
								</div>
                                
                                <div class="featured-box featured-box-secondary featured-box-text-left">
									<div class="box-content">
										<div class="row">
											<div class="col-md-12">
												<i class="icon-featured fa  pull-left mr-lg">2</i> <h2>Find requirement</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<p>You can find the most recent requirement listings in the Authors corner page. and by clicking 'More requirements' you can find the complete requirements posted by the publishers.</p>
                                                
                                                <ul>
                                                <li>Filter the results</li>
                                                    <li>Find your matching requirement</li>
                                                    <li>Go to the publisher details</li>
                                                    <li>Find the contact details there.</li>
                                                </ul>
												
											</div>
										</div>
									</div>
								</div>
                                
                                    <div class="featured-box featured-box-secondary featured-box-text-left">
									<div class="box-content">
										<div class="row">
											<div class="col-md-12">
												<i class="icon-featured fa  pull-left mr-lg">3</i> <h2>Find services</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<p>NextPUB offers complete services what authors require.</p>
                                                
                                                <ul>
                                                <li>Go to Services page</li>
                                                    <li>Select the services you need</li>
                                                    <li>Give your contact details</li>
                                                    <li>Send the online requirement</li>
                                                    <li>NextPUB will be back to you with the best proposal and options.</li>
                                                </ul>
												
											</div>
										</div>
									</div>
								</div>
                                
                                
							</div>
                            
                            <!-- Authors area ends -->
                            
                            <div class="col-md-6">
                                
                                <h2>For Publishers</h2>
                                
								<div class="featured-box featured-box-tertiary featured-box-text-left">
									<div class="box-content">
										<div class="row">
											<div class="col-md-12">
												<i class="icon-featured fa  pull-left mr-lg">1</i> <h2>Register as Publisher</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<p>By registering as a publisher, NextPUB powers you with the following features. </p>
                                                <ul>
                                                <li>Add your complete profile.</li>
                                                    <li>Upload your requirement</li>
                                                    <li>Add profile photo</li>
                                                    <li>Add contact details.</li>
                                                </ul>
												
											</div>
										</div>
									</div>
								</div>
                                
                                <div class="featured-box featured-box-tertiary featured-box-text-left">
									<div class="box-content">
										<div class="row">
											<div class="col-md-12">
												<i class="icon-featured fa  pull-left mr-lg">2</i> <h2>Find Content</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<p>You can find the contents listed by the publishers here. As NextPUB evaluates the content listings and the authors, we assure you the most promising authors and exciting contents here.</p>
                                                <ul>
                                                <li>Find contents at Publisheres corner page</li>
                                                    <li>Look for more contents</li>
                                                    <li>Filter your requirement</li>
                                                    <li>Find the authors and contact them :)</li>
                                                </ul>
												
											</div>
										</div>
									</div>
								</div>
                                
                                   <div class="featured-box featured-box-tertiary featured-box-text-left">
									<div class="box-content">
										<div class="row">
											<div class="col-md-12">
												<i class="icon-featured fa  pull-left mr-lg">3</i> <h2>Find services</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<p>NextPUB offers complete services what authors require.</p>
                                                
                                                <ul>
                                                <li>Go to Services page</li>
                                                    <li>Select the services you need</li>
                                                    <li>Give your contact details</li>
                                                    <li>Send the online requirement</li>
                                                    <li>NextPUB will be back to you with the best proposal and options.</li>
                                                </ul>
												
											</div>
										</div>
									</div>
								</div>
                                
                                
                            </div>
                            
                            <!-- For publishers end -->
                            
                            
                            
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



	</body>
</html>