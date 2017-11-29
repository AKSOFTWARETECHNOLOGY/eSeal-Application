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

$userinfo_sql="SELECT * FROM `users` WHERE `id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);	
$userinfo=mysql_fetch_array($userinfo_exe);

$book_genre = array();
$genre_sql="SELECT * FROM `genres` WHERE `genre_status`='1'";
$genre_exe=mysql_query($genre_sql);
while($genre_fet=mysql_fetch_array($genre_exe))
{
	$book_genre[$genre_fet['id']]=$genre_fet['genre_name'];
}

$book_language = array();
$language_sql="SELECT * FROM `languages` WHERE `language_status`='1'";
$language_exe=mysql_query($language_sql);
while($language_fet=mysql_fetch_array($language_exe))
{
	$book_language[$language_fet['id']]=$language_fet['language_name'];
}

$book_id=$_REQUEST['bookid'];
$book_info_sql="SELECT * FROM `publisher_book_requirement` WHERE `user_id`='$user_id' AND `id`='$book_id'";
$book_info_exe=mysql_query($book_info_sql);
$book_info=mysql_fetch_array($book_info_exe);
//print_r($book_info);
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
								<h2>My <strong>Requirement</strong></h2>
								<div class="" style="float:right;"> View Requirements <a href="dashboard.php#requirement">BACK</a> </div>
							</div>
                            
                                 <div class="row">
                            <div class="col-md-3">
                                
											<a href="#">
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<?php if($book_info['book_photo']!="") { ?>
															<img src="<?php echo $book_info['book_photo']; ?>" class="img-responsive" alt="">
														<?php } else { ?>
															<img src="img/np/book4.jpg" class="img-responsive" alt="">
														<?php } ?>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-edit"></i></span>
														</span>
													</span>
												</span>
											</a>
											<br/><br/><br/>
											
											<a href="delete-book-requirement.php?id=<?php echo $book_info['id']; ?>&delete=1" class="btn btn-md btn-secondary" onclick="return confirm('Are you sure ?')">DELETE BOOK</a>
											
                                
                                </div>
                                
                                <div class="col-md-9">
                                
                                    
                                    <div class="row mb-xl">
										<div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Title</h4>
										</div>
                                        <?php echo $book_info['book_title']; ?>
                                        </div>
                                        
                                        <div class="col-md-3">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Language</h4>
										</div>
                                        <?php //echo $book_info['book_language']; ?>                                        
										<?php echo $book_language[$book_info['book_language']]; ?>
                                        </div><!-- 1/3 col ends-->
                                        
                                        <div class="col-md-3">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Genre</h4>
										</div>
                                        <?php //echo $book_info['book_genre']; ?>
										<?php echo $book_genre[$book_info['book_genre']]; ?>                                        
                                        </div><!-- 1/3 col ends-->
										
										<div class="col-md-3">
										<div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Attachment on</h4>
										</div>
										
										<?php if($book_info['book_attach']!="") { ?>
											<a href="<?php echo $book_info['book_attach']; ?>" alt="" target="_blank"> DOWNLOAD </a>
										<?php } else { ?>
											None
										<?php } ?>
										</div>	
                                        
                                        <div class="col-md-3">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Publisher</h4>
										</div>
										<?php
										$book_user_id=$book_info['user_id'];
										$book_userinfo_sql="SELECT * FROM `publisher` WHERE `user_id`='$book_user_id'";
										$book_userinfo_exe=mysql_query($book_userinfo_sql);	
										$book_userinfo=mysql_fetch_array($book_userinfo_exe);
										?>
                                        <?php echo $book_userinfo['name']; ?>                                        
                                        </div><!-- 1/3 col ends-->
                                        
										<?php /* ?>
                                        <div class="col-md-3">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Title</h4>
										</div>
                                        Making Things Happen
                                        
                                        </div><!-- 1/4 col ends-->
                                        
                                        <div class="col-md-3">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Title</h4>
										</div>
                                        Making Things Happen
                                        
                                        </div><!-- 1/4 col ends-->
                                        <?php */ ?>
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                    
                                    
                                     <div class="row mb-xl">
										<div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
											<h4>Requirement Details</h4>
										</div>
                                        <?php echo $book_info['book_info']; ?>                                        
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            </div>
                             
                                         
                                        
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
