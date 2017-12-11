<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
    header("Location: login.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];


$city_sql="SELECT * FROM `cities` where `city_status`=1";
$city_exe=mysql_query($city_sql);
$city_results = array();
while($row = mysql_fetch_assoc($city_exe)) {
    array_push($city_results, $row);
}

$state_sql="SELECT * FROM `states` where `state_status`=1";
$state_exe=mysql_query($state_sql);
$state_results = array();
while($row = mysql_fetch_assoc($state_exe)) {
    array_push($state_results, $row);
}

$country_sql="SELECT * FROM `countries` where `country_status`=1 AND `id`=99";
$country_exe=mysql_query($country_sql);
$country_results = array();
while($row1 = mysql_fetch_assoc($country_exe)) {
    array_push($country_results, $row1);
}


$userinfo_sql="SELECT * FROM `exporter_info` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);
$userinfo=mysql_fetch_array($userinfo_exe);


$useraddress_sql="SELECT * FROM `exporter_address` WHERE `user_id`='$user_id'";
$useraddress_exe=mysql_query($useraddress_sql);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Address Book</title>
<link href="images/favicon.png" type="image/png" rel="shortcut icon">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
<link href="css/jquery.accordion.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="js/jquery.accordion.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
				autoplay:true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  600: {
                    items:2,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  1000: {
                    items: 2,
                    nav: true,
                    loop: false,
                    margin: 20,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  }
                }
              })
			  
			  $('.bxslider').bxSlider({
			mode: 'horizontal',
			moveSlides: 1,
			slideMargin: 40,
			infiniteLoop: true,
			slideWidth:550,
			minSlides:1,
			maxSlides:2,
			speed: 800,
			//auto:true,
		});
			  
			  
	$(window).scroll(function(){
  var sticky = $('.main-header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});


        $('#only-one [data-accordion]').accordion();

        $('#multiple [data-accordion]').accordion({
          singleOpen: false
        });

        $('#single[data-accordion]').accordion({
          transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
          transitionSpeed: 200
        });
      
			  
            });
</script>
</head>

<body>

<?php include "top_header.php"; ?>

<?php include "header.php"; ?>


<div class="home-about-banner">
<div class="home-about-banner-overlay">
<h3>Address Book Entries</h3>
</div>
</div>


<div class="dashboard">
<div class="container">
<div class="row">

<div class="col-md-3 col-sm-3 col-xs-12">
<?php include "sidebar.php"; ?>
</div><!--Column 6-->

<div class="col-md-9 col-sm-9 col-xs-12">
<div class="my-account">
<h3><i class="fa fa-address-book" aria-hidden="true"></i> Address Book Entries</h3>


   <?php if(mysql_num_rows($useraddress_exe)>0) { ?>

        <?php while($useraddress_fet=mysql_fetch_array($useraddress_exe)) { ?>

    <div class="address-bar" style="border-top: 1px solid #cacaca;">
        <div class="row">
<?php
           $city_value = $useraddress_fet['city'];
           $cityArray_values = array_filter($city_results, function($e) use ($city_value){

               if($e['id'] == $city_value)
               { return true; }
               else
               { return false; }

           });

           if(count($cityArray_values))
           {
               $cityArray_values_key = key($cityArray_values);
               $city_name = $cityArray_values[$cityArray_values_key]['city_name'];
           }
           else
           {
               $city_name = "";
           }

           $state_value = $useraddress_fet['state'];
           $stateArray_values = array_filter($state_results, function($e) use ($state_value){

               if($e['id'] == $state_value)
               { return true; }
               else
               { return false; }

           });

           if(count($stateArray_values))
           {
               $stateArray_values_key = key($stateArray_values);
               $state_name = $stateArray_values[$stateArray_values_key]['state_name'];
           }
           else
           {
               $state_name = "";
           }

           $country_value = $useraddress_fet['country'];
           $countryArray_values = array_filter($country_results, function($e) use ($country_value){

               if($e['id'] == $country_value)
               { return true; }
               else
               { return false; }

           });

           if(count($countryArray_values))
           {
               $countryArray_values_key = key($countryArray_values);
               $country_name = $countryArray_values[$countryArray_values_key]['name'];
           }
           else
           {
               $country_name = "";
           }
?>
           <div class="col-md-8 col-sm-8 col-xs-12">
               <p><label style="width:150px;">Name      </label> <?php echo $useraddress_fet['name']; ?></p>
               <p><label style="width:150px;">Address   </label> <?php echo $useraddress_fet['address']; ?></p>
               <p><label style="width:150px;">City      </label> <?php echo $city_name; ?></p>
               <p><label style="width:150px;">State     </label> <?php echo $state_name; ?></p>
               <p><label style="width:150px;">Country   </label> <?php echo $country_name; ?></p>
               <p><label style="width:150px;">Pincode   </label> <?php echo $useraddress_fet['pincode']; ?></p>
               <p><label style="width:150px;">Mobile    </label> <?php echo $useraddress_fet['mobile']; ?></p>
           </div><!--Inner Column 6-->


           <div class="col-md-4 col-sm-4 col-xs-12">
               <div class="form-btn">
                   <br/>
                   <ul class="">
                       <li><a href="javascript:void(0);">Edit</a></li>
                       <li><a href="javascript:void(0);">Delete</a></li>
                   </ul>

               </div><!--Form Btn-->
           </div><!--Inner Column 6-->



        </div><!--Inner Row-->
    </div><!--Address Bar-->

        <?php } ?>

   <?php } ?>


</div><!--My Account-->

<div class="submit-btn">
<ul>
<li><a class="hidden" href="javascript:void(0);">Back</a></li>
<li><a href="add-address-book.php">New Address</a></li>
</ul>
</div><!--Form Btn-->

</div><!-- Column 9  -->
</div><!-- Row  -->
</div><!-- Container -->
</div><!-- Dash Board -->

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

</body>
</html>
