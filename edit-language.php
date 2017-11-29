<?php session_start();
ob_start();

if(!isset($_SESSION['nextpubuserid']))
{
	header("Location: login.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";


$user_id=$_SESSION['nextpubuserid'];
$user_role=$_SESSION['nextpubuserrole'];
$user_name=$_SESSION['nextpubusername'];
$user_email=$_SESSION['nextpubuseremail'];


$language_sql="SELECT * FROM `languages` WHERE `language_status`='1'";
$language_exe=mysql_query($language_sql);

$user_language = array();
$user_language_sql="SELECT * FROM `language_user` WHERE `user_id`='$user_id'";
$user_language_exe=mysql_query($user_language_sql);
$user_language_cnt=@mysql_num_rows($user_language_exe);
if($user_language_cnt>0)
{
		while($user_language_fet=mysql_fetch_array($user_language_exe))
		{
			$user_language[]=$user_language_fet['language_id'];
		}
}
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
                
                
				<section class="section section-primary pt-md pb-md mt-none">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="mb-none">Dashboard</h2>
								
								
							</div>
							
						</div>
					</div>
				</section>
                
                
    
				<div class="container">
                
                    <div class="row">
                    
                        <div class="col-md-3">
						
							<?php include "user-menu.php"; ?>
							
                        </div>
                        
                        <div class="col-md-9">
                            
                            <div class="heading heading-border heading-middle-border">
								<h2>My <strong>Languages</strong></h2>
								<div class="" style="float:right;"> View Language <a href="dashboard.php#language">BACK</a> </div>
							</div>
                            
                            <div class="row">
							
							
								<div class="panel-body">
									<form class="form-horizontal form-bordered" method="post" action="doedit-language.php">
									
										 
										<div class="form-group">
											<div class="col-md-12">
											
												<?php while($language_fet=@mysql_fetch_array($language_exe)) { ?>
												<div class="col-md-4">
												<input type="checkbox" name="languages[]" value="<?php echo $language_fet['id']; ?>" <?php if (in_array($language_fet['id'], $user_language)) { echo "checked"; } ?> />&nbsp;&nbsp;<?php echo $language_fet['language_name']; ?><br />
												</div>
												<?php } ?>
												
											</div>
										</div>
										
										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userPassword"></label>
											<div class="col-md-6">
												<button type="submit" name="addlanguage" class="btn btn-success mr-xs mb-sm">Update Language</button>
											</div>
										</div>
									</form>
								</div>
						 	
							
							
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



	</body>
</html>
