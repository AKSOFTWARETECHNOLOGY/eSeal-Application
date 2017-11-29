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

		<title>NextPUB | Publishing services</title>	

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
								<h1><strong>Services </strong>we offer.</h1>
								<p class="lead">We offer the following services. Please make your service request here.</p>
								
							</div>
							
						</div>
					</div>
				</section>
                
                
    
				<div class="container">
                
                    <div class="row">
                    
                        <div class="col-sm-12">
                            <h2>Place your service request here.</h2>
                            
							<?php if(isset($_REQUEST['suc'])) { ?>
									<span style="color:green">Mail Sent Successfully</span>
							<?php } ?>
							
							<?php if(isset($_REQUEST['err'])) { ?>
									<span style="color:red">Mail Not Sent Failure</span>
							<?php } ?>
                            
										<form class="form-horizontal form-bordered" action="doservicerequest.php" method="POST" name="service-form">
									
                                        
                                        
                                        <table class="table table-bordered  table-striped">
										<thead>
											<tr class="info">
												
												<th>
													Service
												</th>
												<th>
													Select Required Services
												</th>
												
											</tr>
										</thead>
										<tbody>
                                            
                                            <tr>
												
												<td>
													Select Preferred Colour
												</td>
												<td>
                                                   <div class="radio-inline">
													<label>
														<input type="radio" name="PreferredColour" id="PreferredColour1" value="MultiColour" checked="" required />
														Colour
													</label>
												</div>
												<div class="radio-inline">
													<label>
														<input type="radio" name="PreferredColour" id="PreferredColour2" value="BlackWhite" required />
														Black & White
													</label>
												</div>
												</td>
												
											</tr>
                                            
                                            
											<tr>
												
												<td>
													One on One Author Support
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="One on One Author Support" />
												</td>
												
											</tr>
											<tr>
												
												<td>
													Global Distribution
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Global Distribution" />
												</td>
												
											</tr>
                                            <tr>
												
												<td>
													ISBN Assignment
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="ISBN Assignment" />
												</td>
												
											</tr>
                                            <tr>
												
												<td>
													Content and Development Editing
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Content and Development Editing" />
												</td>
												
											</tr>
                                             <tr>
												
												<td>
													Custom Cover
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Custom Cover" />
												</td>
												
											</tr>
                                             <tr>
												
												<td>
													Personalized BackCover
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Personalized BackCover" />
												</td>
												
											</tr>
                                             <tr>
												
												<td>
													Interior Book Design And Layout
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Interior Book Design And Layout" />
												</td>
												
											</tr>
                                              <tr>
												
												<td>
													Complimentary Author Copy
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Complimentary Author Copy" />
												</td>
												
											</tr>
                                              <tr>
												
												<td>
													Available for Paperbook Books
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Available for Paperbook Books" />
												</td>
												
											</tr>
                                              <tr>
												
												<td>
													Sold in eBook format for Kindle, N iPad, iPhones, Kobo
												</td>
												<td>
													<input type="checkbox" id="" name="services[]" value="Sold in eBook format for Kindle, N iPad, iPhones, Kobo" />
												</td>
												
											</tr>
                                            
                                               <tr>
												
												<td>
													Image Insertions
												</td>
												<td>
													<select class="form-control" name="ImageInsertions" id="ImageInsertions" required >
													<option>10</option>
													<option>25</option>
													<option>50</option>
												</select>
												</td>
												
											</tr>
                                            
                                                <tr>
												
												<td>
													Copyright Registration
												<td>
													<input type="checkbox" id="" name="services[]" value="Copyright Registration" />
												</td>
												
											</tr>
                                            
                                              <tr>
												
												<td>
													Google Search Program
												<td>
													<input type="checkbox" id="" name="services[]" value="Google Search Program" />
												</td>
												
											</tr>
                                            
                                             
                                            
                                              <tr>
												
												<td>
													Cover Copy Polish
												<td>
													<input type="checkbox" id="" name="services[]" value="Cover Copy Polish" />
												</td>
												
											</tr>
                                            
                                              <tr>
												
												<td>
													Editorial Assessment
												<td>
													<input type="checkbox" id="" name="services[]" value="Editorial Assessment" />
												</td>
												
											</tr>
                                            
                                              <tr>
												
												<td>
													Promotional Materials (100)
												<td>
													<input type="checkbox" id="" name="services[]" value="Promotional Materials 100" />
												</td>
												
											</tr>
                                              <tr>
												
												<td>
													Author Website
												<td>
													<input type="checkbox" id="" name="services[]" value="Author Website" />
												</td>
												
											</tr>
                                              <tr>
												
												<td>
													Available for Hardcover Books
												<td>
													<input type="checkbox" id="" name="services[]" value="Available for Hardcover Books" />
												</td>
												
											</tr>
                                              <tr>
												
												<td>
													Paperback Copies
												<td>
													<select class="form-control" name="Paperback Copies" id="Paperback Copies" >
													<option>20</option>
													<option>30</option>
													<option>50</option>
												</select>
												</td>
												
											</tr>
                                             <tr>
												
												<td>
													Hardcover Copies (10)
												<td>
													<input type="checkbox" id="" name="services[]" value="Hardcover Copies 10" />
												</td>
												
											</tr>
                                            
                                            
										</tbody>
									</table>
										
                                        
																				
										
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
											<label class="col-md-3 control-label" for="userName">Mobile</label>
											<div class="col-md-6">
												<input type="number" class="form-control" id="userMoile" name="mobile" required />
											</div>
										</div>										
										
										
										<button type="submit" name="ServiceSubmit" class="btn btn-success mr-xs mb-sm">Request Service</button>
								
                            
                            
										</form>
                            
                            

                        
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
