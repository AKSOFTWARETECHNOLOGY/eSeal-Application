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

$genre_sql="SELECT * FROM `genres` WHERE `genre_status`='1'";
$genre_exe=mysql_query($genre_sql);

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
                            
                            <div id="info" class="heading heading-border heading-middle-border">
							<br /><br /><br /><br /><br /><br />
								<h2>My <strong>Info</strong></h2>
								<div class="" style="float:right;"> Update Profile <a href="edit-profile.php">EDIT</a> </div>
							</div>
                            
                            <div class="row">
                            <div class="col-md-3">
                                
                                	<a href="edit-profile.php">
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<?php if($userinfo['photo']=="") { ?>
														<img src="img/np/p2.jpg" class="img-responsive" alt="">
														<?php } else { ?>
														<img src="<?php echo $userinfo['photo']; ?>" class="img-responsive" alt="">
														<?php } ?>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-edit"></i></span>
														</span>
													</span>
												</span>
											</a>
                                
                                </div>
                                
                                <div class="col-md-9">
                                
                                    
                                    <div class="row mb-xl">
                                    <div class="col-md-4">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
								<h4>Name</h4>
							</div>
                                        <?php echo $userinfo['name']; ?>
                                        
                                        </div><!-- 1/3 col ends-->
                                        
                                        <div class="col-md-4">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
								<h4>Phone</h4>
							</div>
                                        <?php echo $userinfo['telephone']; ?>
                                        
                                        </div><!-- 1/3 col ends-->
                                        
                                        <div class="col-md-4">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
								<h4>Email</h4>
							</div>
                                        <?php echo $userinfo['email']; ?>
                                        
                                        </div><!-- 1/3 col ends-->
                                        
                                    </div>
                                    
                                    <div class="row mb-xl">
                                    <div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
								<h4>Address</h4>
							</div>
                                        <?php echo $userinfo['address']; ?>
                                        
                                        </div>
                                    </div>
                                    
                                     <div class="row mb-xl">
                                    <div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
								<h4>Bio</h4>
							</div>
                                        <?php echo $userinfo['bio']; ?>
                                        
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            </div>
							
							<!-- languages starts-->
                            
                             <div id="language" class="heading heading-border heading-middle-border">
							 <br /><br /><br /><br /><br /><br />
								<h2>My <strong>Languages</strong></h2>
								<div class="" style="float:right;"> Update Languages <a href="edit-language.php">EDIT</a> </div>
							</div>
                            
								<div class="row mb-xl">
                                    <div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
										<h4>Languages</h4>
										</div>
                                    </div>
									<div class="col-md-12">
										<?php while($language_fet=@mysql_fetch_array($language_exe)) { ?>
											
											<?php if (in_array($language_fet['id'], $user_language)) {  ?><div class="col-md-3"><?php echo $language_fet['language_name']; ?></div><?php } ?>
											
										<?php } ?>
                                    </div> 
                                <br/><br/><br/>  
                                  
                                </div>
                            
                            <!-- languages ends-->
							
							<!-- genres starts-->
                            
                            <div id="genre" class="heading heading-border heading-middle-border">
							<br /><br /><br /><br /><br /><br />
								<h2>My <strong>Genre</strong></h2>
								<div class="" style="float:right;"> Update Genres <a href="edit-genre.php">EDIT</a> </div>
							</div>
                            
									<div class="row mb-xl">
                                    <div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
										<h4>Genre</h4>
										</div>
                                    </div>
                                  
									<div class="col-md-12">
										<?php while($genre_fet=@mysql_fetch_array($genre_exe)) { ?>
											
											<?php if (in_array($genre_fet['id'], $user_genre)) {  ?><div class="col-md-3"><?php echo $genre_fet['genre_name']; ?></div><?php } ?>
											
										<?php } ?>
                                    </div> 
									<br/><br/><br/>  
                                    </div>        
                                      
                                  
									<!-- Genres ends-->
                            
								<?php if($user_role==2) { ?>
								
                             <div id="content" class="heading heading-border heading-middle-border">
							 <br /><br /><br /><br /><br /><br />
								<h2>My <strong>Content</strong></h2>
							</div>
                            
                                 <div class="row">
								
								<?php 
								
								$content_info_sql="SELECT * FROM `writer_content` WHERE `user_id`='$user_id'";
								$content_info_exe=mysql_query($content_info_sql);
								$content_info_num=@mysql_num_rows($content_info_exe);
								if($content_info_num>0) {
								while($content_info=mysql_fetch_array($content_info_exe)) { ?>	
								<div class="col-md-3">
									<?php //print_r($content_info); ?>
									<a href="view-content.php?contentid=<?php echo $content_info['id']; ?>">
										<span class="thumb-info thumb-info-centered-info">
											<span class="thumb-info-wrapper">
											<?php if($content_info['content_photo']!="") { ?>
												<img src="<?php echo $content_info['content_photo']; ?>" class="img-responsive" alt="">
											<?php } else { ?>
												<img src="img/np/content.gif" class="img-responsive" alt="">
											<?php } ?>	
												<span class="thumb-info-title">
													<span class="thumb-info-inner"><?php echo $content_info['content_title']; ?> <em><?php echo $content_info['created_at']; ?></em></span>
													<span class="thumb-info-type"><?php echo $content_info['content_title']; ?></span>
												</span>
												<span class="thumb-info-action">
													<span class="thumb-info-action-icon"><i class="fa fa-edit"></i></span>
												</span>
											</span>
										</span>
									</a>
                                </div>
								<?php } } ?>
                                
                                <div class="col-md-3">
                                    
                                    	<span class="thumb-info thumb-info-centered-icons">
												<span class="thumb-info-wrapper">
													<img src="img/np/addbook.jpg" class="img-responsive" alt="">
													<span class="thumb-info-action">
														
														<a href="add-content.php">
															<span class="thumb-info-action-icon thumb-info-action-icon-secondary" title=""><i class="fa fa-plus"></i></span>
														</a>
													
													</span>
												</span>
											</span>
                                
                    
                                </div>
                            
                            </div>
                            
                            
                            
                             
                            
                            <!-- My Contents ends -->
							
								<?php } ?>
                            
							<?php if($user_role==7) { ?>
							<div id="book" class="heading heading-border heading-middle-border">
								<br /><br /><br /><br /><br /><br />
								<h2>My <strong>Book</strong></h2>								
							</div>
                            
                                 <div class="row">
								 
                            <?php 
								
								$content_info_sql="SELECT * FROM `publisher_book` WHERE `user_id`='$user_id'";
								$content_info_exe=mysql_query($content_info_sql);
								$content_info_num=@mysql_num_rows($content_info_exe);
								if($content_info_num>0) {
								while($content_info=mysql_fetch_array($content_info_exe)) { ?>	
								<div class="col-md-3">
									<?php //print_r($content_info); ?>
									<a href="view-book.php?bookid=<?php echo $content_info['id']; ?>">
												<span class="thumb-info thumb-info-centered-info">
													<span class="thumb-info-wrapper">
													<?php if($content_info['book_photo']!="") { ?>
														<img src="<?php echo $content_info['book_photo']; ?>" class="img-responsive" alt="">
													<?php } else { ?>
														<img src="img/np/book4.jpg" class="img-responsive" alt="">
													<?php } ?>	
														<span class="thumb-info-title">
															<span class="thumb-info-inner"><?php echo $content_info['book_title']; ?> <em><?php echo $content_info['created_at']; ?></em></span>
															<span class="thumb-info-type"><?php echo $content_info['book_title']; ?></span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-edit"></i></span>
														</span>
													</span>
												</span>
											</a>
                                </div>
								<?php } } ?>
                                
                                
                                <div class="col-md-3">
                                    
                                    	<span class="thumb-info thumb-info-centered-icons">
												<span class="thumb-info-wrapper">
													<img src="img/np/addbook.jpg" class="img-responsive" alt="">
													<span class="thumb-info-action">
														
														<a href="add-book.php">
															<span class="thumb-info-action-icon thumb-info-action-icon-secondary" title=""><i class="fa fa-plus"></i></span>
														</a>
													
													</span>
												</span>
											</span>
                                
                    
                                </div>
                            
                            </div>
                            
                            
                            
                             
                            
                            <!-- My Books ends -->
                            <?php } ?>
							
							
							<?php if($user_role==7) { ?>
							<div id="requirement" class="heading heading-border heading-middle-border">
								<br /><br /><br /><br /><br /><br />
								<h2>My <strong>Requirement</strong></h2>								
							</div>
                            
                                 <div class="row">
								 
                            <?php 
								
								$content_info_sql="SELECT * FROM `publisher_book_requirement` WHERE `user_id`='$user_id'";
								$content_info_exe=mysql_query($content_info_sql);
								$content_info_num=@mysql_num_rows($content_info_exe);
								if($content_info_num>0) {
								while($content_info=mysql_fetch_array($content_info_exe)) { ?>	
								<div class="col-md-3">
									<?php //print_r($content_info); ?>
									<a href="view-book-requirement.php?bookid=<?php echo $content_info['id']; ?>">
												<span class="thumb-info thumb-info-centered-info">
													<span class="thumb-info-wrapper">
													<?php if($content_info['book_photo']!="") { ?>
														<img src="<?php echo $content_info['book_photo']; ?>" class="img-responsive" alt="">
													<?php } else { ?>
														<img src="img/np/book4.jpg" class="img-responsive" alt="">
													<?php } ?>	
														<span class="thumb-info-title">
															<span class="thumb-info-inner"><?php echo $content_info['book_title']; ?> <em><?php echo $content_info['created_at']; ?></em></span>
															<span class="thumb-info-type"><?php echo $content_info['book_title']; ?></span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-edit"></i></span>
														</span>
													</span>
												</span>
											</a>
                                </div>
								<?php } } ?>
                                
                                
                                <div class="col-md-3">
                                    
                                    	<span class="thumb-info thumb-info-centered-icons">
												<span class="thumb-info-wrapper">
													<img src="img/np/addbook.jpg" class="img-responsive" alt="">
													<span class="thumb-info-action">
														
														<a href="add-book-requirement.php">
															<span class="thumb-info-action-icon thumb-info-action-icon-secondary" title=""><i class="fa fa-plus"></i></span>
														</a>
													
													</span>
												</span>
											</span>
                                
                    
                                </div>
                            
                            </div>
                            
                            
                            
                             
                            
                            <!-- My Books ends -->
                            <?php } ?>
                            
							<?php /* ?>
                            <hr class="tall">
                            
                            
                            
                             <div class="heading heading-border heading-middle-border">
								<h2>My <strong>Books</strong></h2>
							</div>
                            
                                 <div class="row">
                            <div class="col-md-3">
                                
                                	<a href="portfolio-single-small-slider.html">
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<img src="img/np/book4.jpg" class="img-responsive" alt="">
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-edit"></i></span>
														</span>
													</span>
												</span>
											</a>
                                
                                </div>
                                
                                <div class="col-md-9">
                                
                                    
                                    <div class="row mb-xl">
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
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                    
                                    
                                     <div class="row mb-xl">
                                    <div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
								<h4>Book Details</h4>
							</div>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tempus aliquam luctus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vitae odio eget diam commodo laoreet eu eget tortor. In hac habitasse platea dictumst. Fusce molestie convallis risus in cursus. Etiam eu mauris quis odio auctor interdum ut id nisi. 
                                        
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            </div>
                            
                            <hr class="">
                            
                             <div class="row mt-xl">
                                    <div class="col-md-12">
                                        <div class="heading heading-border heading-bottom-border mb-sm">
								<h4>Add New Book</h4>
							</div>
                                        
                                        
                                        </div>
                                    </div>
							<?php */ ?>		
                            
                             
                            
                            <!-- My Books ends -->
                            
                            
                        
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
