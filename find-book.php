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
	$keyword_filter=" AND `book_title` LIKE '%$keyword%'";
}

$genre_filter="";

if(!empty($_REQUEST['genre']))
{
	$genre=$_REQUEST['genre'];
	$genre_filter=" AND `book_genre`='$genre'";
}

$language_filter="";

if(!empty($_REQUEST['language']))
{
	$language=$_REQUEST['language'];
	$language_filter=" AND `book_language`='$language'";
}

$content_info_sql="SELECT * FROM `publisher_book` WHERE `book_status`='1' AND `user_id`>0 $keyword_filter $genre_filter $language_filter";
$content_info_exe=mysql_query($content_info_sql);
$content_info_num=@mysql_num_rows($content_info_exe);

}
else
{
$content_info_sql="SELECT * FROM `publisher_book` WHERE `book_status`='1'";
$content_info_exe=mysql_query($content_info_sql);
$content_info_num=@mysql_num_rows($content_info_exe);
}


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

		<title>NextPUB | Book Listing</title>	

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
                                <h2 class="mb-md">Listings <strong>Books</strong></h2>
								<p class="lead">Search results and listings book.</p>
							</div>
						</div>
					</div>
				</section>
                
                
                <?php include "book-filter.php"; ?>
                <!-- search filter ends-->
                
                <hr class="tall">
                
                
                <div class="container">
                    <h2 class="center">Book listing</h2>
                <div class="row mb-xl">
				
								<?php 
								if($content_info_num>0) {
								while($content_info=mysql_fetch_array($content_info_exe)) { ?>	
								
								<div class="col-md-4">
									<span class="thumb-info thumb-info-side-image thumb-info-no-zoom">
										<span class="thumb-info-side-image-wrapper">
											<?php if($content_info['book_photo']!="") { ?>
												<img src="<?php echo $content_info['book_photo']; ?>" class="img-responsive" alt="" style="width: 160px;height:160px">
											<?php } else { ?>
												<img src="img/np/content.gif" class="img-responsive" alt="" style="width: 160px;height:160px">
											<?php } ?>	
											
										</span>
										<span class="thumb-info-caption">
											<span class="thumb-info-caption-text">
												<h4 class="text-uppercase mb-xs"><?php echo $content_info['book_title']; ?> </h4>
												<h5 class="mb-xs"><?php echo $content_language[$content_info['book_language']]; ?> </h5>
												<h5 class="mb-xs"><?php echo $content_genre[$content_info['book_genre']]; ?> </h5>
												<?php echo substr($content_info['book_info'],0,20); ?>
												<a href="book.php?bookid=<?php echo $content_info['id']; ?>"class="btn btn-md btn-secondary">VIEW</a>
											</span>
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
