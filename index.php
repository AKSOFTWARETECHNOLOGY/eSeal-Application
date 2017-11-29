<?php session_start();
ob_start();
/*
if(!isset($_SESSION['nextpubuserid']))
{
	header("Location: login.php");
}
*/

include "config.php";

$content_genre = array();
$genre_sql="SELECT * FROM `genres` WHERE `genre_status`='1'";
$genre_exe=mysql_query($genre_sql);
while($genre_fet=mysql_fetch_array($genre_exe))
{
	$content_genre[$genre_fet['id']]=$genre_fet['genre_name'];
}

$content_language = array();
$language_sql="SELECT * FROM `languages` WHERE `language_status`='1'";
$language_exe=mysql_query($language_sql);
while($language_fet=mysql_fetch_array($language_exe))
{
	$content_language[$language_fet['id']]=$language_fet['language_name'];
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
			<header id="header" class="header-narrow header-transparent" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 1, "stickySetTop": "1"}'>
				<div class="header-body">
					<div class="header-container container">
						<?php include "header-menu.php"; ?>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper" style="height: 1000px;">
					<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"sliderLayout": "fullscreen"}'>
						<ul>
							<li data-transition="fade">
								<img src="img/np/bgslide.jpg"  
									alt=""
									data-bgposition="bottom center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">

								<div class="tp-caption"
									data-x="right" data-hoffset="0"
									data-y="bottom" data-voffset="-200"
									data-start="1000"
									style="z-index: 5"
									data-transform_in="y:[-300%];opacity:0;s:500;"><img src="img/np/book.png" alt=""></div>

								<div class="tp-caption top-label"
									data-x="left" data-hoffset="0"
									data-y="center" data-voffset="30"
									data-start="500"
									style="z-index: 5; font-size: 2em;"
									data-transform_in="y:[-300%];opacity:0;s:500;">Get everything to get your</div>

								

								<div class="tp-caption main-label"
									data-x="left" data-hoffset="0"
									data-y="center" data-voffset="80"
									data-start="1500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;">Content published</div>

								<div class="tp-caption bottom-label"
									data-x="left" data-hoffset="0"
									data-y="center" data-voffset="140"
									data-start="2000"
									style="z-index: 5"
									data-transform_in="y:[100%];opacity:0;s:500;">Platform for New Age Publishing Stakeholders</div>

								<a class="tp-caption btn btn-lg btn-secondary btn-slider-action"
									data-hash
									data-hash-offset="85"
									href="register.php"
									data-x="left" data-hoffset="0"
									data-y="center" data-voffset="200"
									data-start="2200"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;">Get Started Now!</a>
								
							</li>
						</ul>
					</div>
				</div>
				
                
                
                
                <section class="section section-secondary mt-none mb-none" style="border: 0;">
					<div class="container center">
                        
                        <h2>At Next<strong>PUB</strong> you can find the right resources</h2>
                        
                      
				
						<div class="row mb-xl">
							
                             <div class="col-md-2 col-sm-6 center text-md"  data-appear-animation="fadeInUp" data-appear-animation-delay="0">
									
										<i class="fa fa-book txtxxl mb-md" aria-hidden="true"></i>
										 <p>Writters</p>
										
								</div>
                            
                             <div class="col-md-2 col-sm-6 center text-md"  data-appear-animation="fadeInUp" data-appear-animation-delay="300">
									
										<i class="fa fa-file-text txtxxl mb-md" aria-hidden="true"></i>
										 <p>Editors</p>
										
								</div>
                            
                            
                            
                             <div class="col-md-2 col-sm-6 center text-md"  data-appear-animation="fadeInUp" data-appear-animation-delay="600">
									
										<i class="fa fa-file-text txtxxl mb-md" aria-hidden="true"></i>
										 <p>Proof Readers</p>
										
								</div>
                            
                             <div class="col-md-2 col-sm-6 center text-md"  data-appear-animation="fadeInUp" data-appear-animation-delay="900">
									
										<i class="fa fa-book txtxxl mb-md" aria-hidden="true"></i>
										 <p>Type Setters</p>
										
								</div>
                            
                             <div class="col-md-2 col-sm-6 center text-md"  data-appear-animation="fadeInUp" data-appear-animation-delay="1200">
									
										<i class="fa fa-file-text txtxxl mb-md" aria-hidden="true"></i>
										 <p>Designers</p>
										
								</div>
                            
                             <div class="col-md-2 col-sm-6 center text-md"  data-appear-animation="fadeInUp" data-appear-animation-delay="1500">
									
										<i class="fa fa-book txtxxl mb-md" aria-hidden="true"></i>
										 <p>Publishers</p>
										
								</div>
                            
                            
							
						</div>
                        
                        <div class="get-started">
									<a href="register.php" class="btn btn-lg btn-secondary">Get Started Now!</a>
									
								</div>
				
					</div>
				</section>
				
			
				
                <div class="container mt-xl mb-xl">
                
                <div class="row">
                    
                    <div class="col-md-6">
                        
                        <h2 class="mb-sm"><strong>Bringing content <br>
owners and Publishers <br>
on the same platform.</strong></h2>
                        <h4 class="mt-none">We provide a supportive environment <br>
backed by high end technology to the <br>
publishing stakeholders</h4>
                        
                        <div>
                         <div class="feature-box feature-box-style-5 mt-xl">
										<div class="feature-box-icon">
											<i class="fa fa-thumbs-o-up"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm text-weight-light">Cross Vertical <br>
Information Dissemination</h4>
											
										</div>
									</div>
                        
                                           <div class="feature-box feature-box-style-5">
										<div class="feature-box-icon">
											<i class="fa fa-file-text"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm text-weight-light">User access to <br>
backend system</h4>
											
										</div>
									</div>
                        
                        
                                                 <div class="feature-box feature-box-style-5">
										<div class="feature-box-icon">
											<i class="fa fa-bar-chart"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-sm text-weight-light">Web Analytics to <br>
multiple user at a time</h4>
											
										</div>
									</div></div>
                        
                        <br>
                        
                        <div class="">
									<a href="register.php" class="btn btn-lg btn-secondary">Get Started Now!</a>
									
								</div>
                        
                        
                        
                        
                        <div class="row">
                        <div class="col-md-12">
                           
                            </div>
                        </div>
                        
                        
                       
                    
                    </div>
                    
                    <div class="col-md-6">
                    <img src="img/np/book2.jpg"/>
                    </div>
                    
                    </div>
                
                </div>
                 
                
                <section class="section section-primary">
                
                <div class="container">
					<h2 class="center">The most recent books published @ NextPUB</h2>
					<div class="row"> 
                    	<?php
						$publisher_book_sql="SELECT * FROM `publisher_book`";
						$publisher_book_exe=mysql_query($publisher_book_sql);
						$publisher_book_cnt=@mysql_num_rows($publisher_book_exe); 
						if($publisher_book_cnt>0)
						{
						while($publisher_book_fet=mysql_fetch_array($publisher_book_exe))
						{
						?>

							<div class="col-md-2">
								<a href="book.php?bookid=<?php echo $publisher_book_fet['id']; ?>">
									<span class="thumb-info thumb-info-no-borders mt-lg">
										<span class="thumb-info-wrapper">
											<?php if($publisher_book_fet['book_photo']!="") { ?>
												<img src="<?php echo $publisher_book_fet['book_photo']; ?>" class="img-responsive" alt="<?php echo $publisher_book_fet['book_title']; ?>" >
											<?php } else { ?>
												<img src="img/np/content.gif" class="img-responsive" alt="<?php echo $publisher_book_fet['book_title']; ?>" >
											<?php } ?>	
											
											<span class="thumb-info-title">
												<span class="thumb-info-inner"><?php echo $content_genre[$publisher_book_fet['book_genre']]; ?></span>
												<span class="thumb-info-type"><?php echo $content_language[$publisher_book_fet['book_language']]; ?></span>
											</span>
											<span class="thumb-info-action">
												<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
											</span>
										</span>
									</span>
								</a>
							</div>
                    														
						<?php
						}
						}
						?>
 
                    </div>
                    
						<div class="center mt-xl">
							<a href="find-book.php" class="btn btn-lg btn-secondary">Look for more book listings</a>
						</div>
					</div>
                </section>
                
                 <div class="container">
                    
                    <div class="row mt-lg">
                    <div class="col-md-12 center">
                    <h2 class="mb-sm">Inspiring Success Stories</h2>
                    <h4>NextPUB helped many content owners to realise their dreams. Look at some of them here.</h4>
                    </div>
                    </div>
                    
                    
                    <div class="row">
						<div class="col-md-3">
							<div class="testimonial testimonial-primary">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail img-thumbnail">
										<img src="img/np/lt01.jpg" alt="" class="img-circle">
									</div>
									<p><strong>Manish</strong><span>Mumbai</span></p>
								</div>
							</div>
						</div>
						
                        <div class="col-md-3">
							<div class="testimonial testimonial-primary">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail img-thumbnail">
										<img src="img/np/lt01.jpg" alt="">
									</div>
									<p><strong>Monica</strong><span>Chennai, India</span></p>
								</div>
							</div>
						</div>
                        
                        <div class="col-md-3">
							<div class="testimonial testimonial-primary">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail img-thumbnail">
										<img src="img/np/lt01.jpg" alt="">
									</div>
									<p><strong>Pranoy J</strong><span>New Delhi</span></p>
								</div>
							</div>
						</div>
                        
                        <div class="col-md-3">
							<div class="testimonial testimonial-primary">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail img-thumbnail">
										<img src="img/np/lt01.jpg" alt="">
									</div>
									<p><strong>Ramesh</strong><span>Bangalore</span></p>
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