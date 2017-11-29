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

if(isset($_REQUEST['submit']))
{
	
$keyword_filter="";

if(!empty($_REQUEST['keyword']))
{
	$keyword=$_REQUEST['keyword'];
	$keyword_filter=" AND `content_title` LIKE '%$keyword%'";
}

$genre_filter="";

if(!empty($_REQUEST['genre']))
{
	$genre=$_REQUEST['genre'];
	$genre_filter=" AND `content_genre`='$genre'";
}

$language_filter="";

if(!empty($_REQUEST['language']))
{
	$language=$_REQUEST['language'];
	$language_filter=" AND `content_language`='$language'";
}
 
 
$user_info_sql="SELECT u.id, u.confirmed, u.`delete_status`, p.* FROM `users` u INNER JOIN `writer` p ON u.`id` = p.`user_id` AND u.`id` != 1 AND u.`confirmed`=1 AND u.`delete_status`=0";
$user_info_exe=mysql_query($user_info_sql);
$user_info_num=@mysql_num_rows($user_info_exe);

}
else
{
	
$user_info_sql="SELECT u.id, u.confirmed, u.`delete_status`, p.* FROM `users` u INNER JOIN `writer` p ON u.`id` = p.`user_id` AND u.`id` != 1 AND u.`confirmed`=1 AND u.`delete_status`=0";
$user_info_exe=mysql_query($user_info_sql);
$user_info_num=@mysql_num_rows($user_info_exe);

}


?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>NextPUB | Author Listing</title>	

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
							<div class="col-md-12">
                                <h2 class="mb-md">Listings <strong>Authors</strong></h2>
								<p class="lead">Search results and listings author.</p>
                               
								
							</div>
                          
							
						</div>
					</div>
				</section>
                
                
                <?php //include "content-filter.php"; ?>
                <!-- search filter ends-->
                
                <hr class="tall">
                
                
                <div class="container">
                    <h2 class="center">Authors listing</h2>
                <div class="row mb-xl">
				
								<?php 
								if($user_info_num>0) {
								while($user_info=mysql_fetch_array($user_info_exe)) { ?>	
								<?php
								
								$language_sql="SELECT * FROM `languages` WHERE `language_status`='1'";
								$language_exe=mysql_query($language_sql);

								$genre_sql="SELECT * FROM `genres` WHERE `genre_status`='1'";
								$genre_exe=mysql_query($genre_sql);
								
								$user_id = $user_info['user_id'];
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

								$user_genre = array();
								$user_genre_sql="SELECT * FROM `genre_user` WHERE `user_id`='$user_id'";
								$user_genre_exe=mysql_query($user_genre_sql);
								$user_genre_cnt=@mysql_num_rows($user_genre_exe);
								if($user_genre_cnt>0)
								{
										while($user_genre_fet=mysql_fetch_array($user_genre_exe))
										{
											$user_genre[]=$user_genre_fet['genre_id'];
										}
								}
								?>
								
								<div class="col-md-3">
									<?php //print_r($user_info); ?>
                                	<span class="thumb-info thumb-info-hide-wrapper-bg">
										<a href="writer.php?user_id=<?php echo $user_info['user_id']; ?>">
										<span class="thumb-info-wrapper">
											<?php if($user_info['photo']!="") { ?>
											<img src="<?php echo $user_info['photo']; ?>" class="img-responsive" alt="">
											<?php } else { ?>
											<img src="img/np/p1.png" class="img-responsive" alt="">
											<?php } ?>
											<span class="thumb-info-title">
												<span class="thumb-info-inner"><?php echo $user_info['name']; ?></span>
												<?php while($genre_fet=@mysql_fetch_array($genre_exe)) { ?>
												<?php if (in_array($genre_fet['id'], $user_genre)) {  ?>
												<span class="thumb-info-type"><?php echo $genre_fet['genre_name']; ?></span> &nbsp;&nbsp;
												<?php } ?>											
												<?php } ?>											
											</span>
										</span>
										</a>
										<span class="thumb-info-caption" style="display:none;">
											<span class="thumb-info-caption-text">
											<?php echo substr($user_info['bio'],0,20); ?>
											</span>
											<span class="thumb-info-caption-text">
											<?php echo $user_info['city']; ?>, <?php echo $user_info['country']; ?>
											</span>
											<span class="thumb-info-social-icons">
											<?php while($language_fet=@mysql_fetch_array($language_exe)) { ?>
											<?php if (in_array($language_fet['id'], $user_language)) {  ?>
											<div class="col-md-6"><?php echo $language_fet['language_name']; ?></div>
											<?php } ?>
											<?php } ?>
												
											</span>
											<span class="thumb-info-social-icons">
											<?php while($genre_fet=@mysql_fetch_array($genre_exe)) { ?>
											<?php if (in_array($genre_fet['id'], $user_genre)) {  ?>
											<div class="col-md-3"><?php echo $genre_fet['genre_name']; ?></div>
											<?php } ?>											
											<?php } ?>
											</span>
											<!--
											<span class="thumb-info-social-icons">
												<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
												<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
												<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
											</span>
											-->											
										</span>
									</span>
                                </div>

								 
								<?php } } ?>
                                
                
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
