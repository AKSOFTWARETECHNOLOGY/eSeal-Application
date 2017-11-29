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

if($user_role==2)
{
	
$userinfo_sql="SELECT * FROM `writer` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);	
$userinfo=mysql_fetch_array($userinfo_exe);

}

if($user_role==7)
{
	
$userinfo_sql="SELECT * FROM `publisher` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);	
$userinfo=mysql_fetch_array($userinfo_exe);

}


$city_sql="SELECT * FROM `cities` WHERE `country`='99'";
$city_exe=mysql_query($city_sql);	

//print_r($userinfo);
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
								<h2 class="mb-none">Edit Profile</h2>
								
								
							</div>
							
						</div>
					</div>
				</section>
                
                
    
				<div class="container">
                
                    <div class="row">
                    
                        <div class="col-md-3">
                            
     <aside class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options='{"minWidth": 991, "containerSelector": ".container", "padding": {"top": 110}}'>

								<h4 class="heading-secondary">Dashboard</h4>
								<ul class="nav nav-list mb-xlg">
									<li><a href="#">Contact Info</a></li>
                                    <li><a href="#">My Languages</a></li>
                                    <li><a href="#">My Genre</a></li>
                                    <li><a href="#">My Books</a></li>
									<li><a href="logout.php">Logout</a></li>
         </ul></aside>
                        
                        </div>
                        
                        <div class="col-md-9">
                            
                            <div class="heading heading-border heading-middle-border">
								<h2>My <strong>Info</strong></h2>
								<div class="" style="float:right;"> View Profile <a href="dashboard.php">BACK</a> </div>
							</div>
                            
                            <div class="row">
							
							
								<div class="panel-body">
									<form class="form-horizontal form-bordered" method="post" action="doedit-profile.php" enctype="multipart/form-data">
									
										
										<div class="col-md-12 hidden">
                                
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<img src="img/np/p2.jpg" class="img-responsive" alt="" style="width:100px;height:100px;">
													</span>
												</span>
								
										</div>
										 
									
										<div class="form-group">
											<label class="col-md-3 control-label" for="userPhoto">Photo</label>
											<div class="col-md-6">
												<input type="file" class="form-control" id="userPhoto" name="photo" accept="image/*"/>
											</div>
										</div>
										 
										<div class="form-group">
											<label class="col-md-3 control-label" for="userName">Name</label>
											<div class="col-md-6">
												<input type="text" class="form-control" id="userName" name="name" value="<?php echo $userinfo['name']; ?>" required />
											</div>
										</div>
										 
										<div class="form-group">
											<label class="col-md-3 control-label" for="usermOBILE">Mobile</label>
											<div class="col-md-6">
												<input type="number" class="form-control" id="userMoile" name="mobile" value="<?php echo $userinfo['telephone']; ?>" required />
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-3 control-label" for="userAddress">Address</label>
											<div class="col-md-6">
												<textarea class="form-control" id="userAddress" name="address" required><?php echo $userinfo['address']; ?></textarea>
											</div>
										</div>										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userBio">Bio</label>
											<div class="col-md-6">
												<textarea class="form-control" id="userBio" name="bio" required><?php echo $userinfo['bio']; ?></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userCuty">City</label>
											<div class="col-md-6">
												<select class="form-control" id="userCity" name="city" required >
													<?php while($city_fet=@mysql_fetch_array($city_exe)) { ?>
													<option value="<?php echo $city_fet['id']; ?>" <?php if($city_fet['id']==$userinfo['city']) { echo "selected"; } ?>><?php echo $city_fet['city_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										
										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userPassword"></label>
											<div class="col-md-6">
												<button type="submit" name="profileupdate" class="btn btn-success mr-xs mb-sm">Update Profile</button>
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
