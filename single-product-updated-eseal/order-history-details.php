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


$userinfo_sql="SELECT * FROM `exporter_info` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);
$userinfo=mysql_fetch_array($userinfo_exe);

$order_id=$_REQUEST['order_id'];
$product_order_sql="SELECT * FROM `product_order` WHERE `id`='$order_id' AND `product_exporter_id`='$user_id' ORDER BY `id` DESC";
$product_order_exe=mysql_query($product_order_sql);
if(mysql_num_rows($product_order_exe)>0) {
    $product_order_fet=mysql_fetch_array($product_order_exe);
}
else
{
    header("Location:order-history.php?err=1");
}

$product_id=$product_order_fet['product_id'];
$product_sql="SELECT * FROM `products` WHERE `id`='$product_id'";
$product_exe=mysql_query($product_sql);
$product_fet=mysql_fetch_array($product_exe);

$product_info_order_id=$product_order_fet['id'];
$product_info_order_sql="SELECT * FROM `product_order_info` WHERE `product_order_id`='$product_info_order_id'";
$product_info_order_exe=mysql_query($product_info_order_sql);

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

$city_value = $product_order_fet['product_delivery_city'];
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

$state_value = $product_order_fet['product_delivery_state'];
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

$country_value = $product_order_fet['product_delivery_country'];
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Order History Details</title>
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



<div class="home-about-banner hidden">
    <div class="home-about-banner-overlay">
        <h3>Order History Details</h3>
    </div>
</div>


<div class="dashboard">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-3 col-sm-3 col-xs-12">
                <?php include "sidebar.php"; ?>
            </div><!--Column 6-->

            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="submit-btn">
                    <ul>
                        <li><a class="hidden" href="#">New Complaint</a></li>
                        <li><a class="" href="order-history.php">Back</a></li>
                    </ul>
                </div><!--Form Btn-->
                <div class="order-history-details">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <th colspan="2">Order Details</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b>Order ID: </b> #<?php echo $product_order_fet['product_order_id']; ?> <br>
                                    <b>Date Added:</b> <?php echo $product_order_fet['product_sale_date']; ?>
                                </td>
                                <td>
                                    <b>Order Method: </b> <?php echo $product_order_fet['product_sale_type']; ?> <br>
                                    <b>Payment Method: </b> <?php echo $product_order_fet['product_sale_payment_type']; ?> <br>
                                    <b>Shipping Method:</b> <?php echo $product_order_fet['product_delivery_type']; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                            <th>Delivery Address</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?php echo $product_order_fet['product_delivery_name']; ?><br>
                                    <?php echo $product_order_fet['product_delivery_address']; ?>,
                                    <?php echo $city_name; ?>, <?php echo $state_name; ?>, <?php echo $country_name; ?> - <?php echo $product_order_fet['product_delivery_pincode']; ?><br>
                                    <?php echo "Mobile : ".$product_order_fet['product_delivery_mobile']; ?><br>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <table class="table">
                            <thead>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th></th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $product_fet['product_name']; ?> </td>
                                <td>Electronic Seal</td>
                                <td><?php echo $product_order_fet['product_sale_quantity']; ?></td>
                                <td>Rs. <?php echo $product_fet['product_price']; ?></td>
                                <td>Rs. <?php echo $product_order_fet['product_sale_total']; ?></td>
                                <td>
                                    <ul class="hidden">
                                        <li><a href="javascript:void(0);"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-reply"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                            <tr>
                                <td colspan="3"></td>
                                <td>Sub-Total</td>
                                <td>Rs. <?php echo $product_order_fet['product_sale_total']; ?></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                                <td>Flat Shipping Rate</td>
                                <td>Rs. 0.00</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan="3"></td>
                                <td>Total</td>
                                <td>Rs. <?php echo $product_order_fet['product_sale_total']; ?></td>
                                <td></td>
                            </tr>
                            <tfoot>
                            </tfoot>
                        </table>

                        <h3>Order Items</h3>

                        <table class="table">
                            <thead>
                            <th>SSG CODE</th>
                            <th>SEAL CODE</th>
                            <th>STATUS</th>
                            </thead>
                            <tbody>
                            <?php if(mysql_num_rows($product_info_order_exe)>0) { ?>
                            <?php while($product_info_order_fet=mysql_fetch_array($product_info_order_exe)) { ?>

                            <tr>
                                <td><?php echo $product_info_order_fet['product_unicode']; ?></td>
                                <td><?php echo $product_info_order_fet['product_sealcode']; ?></td>
                                <td><?php if($product_info_order_fet['seal_type']=="") { echo "Unused"; } else {  echo "Used"; }?></td>
                            </tr>

                                <?php } ?>

                            <?php } else { ?>

                                <tr>
                                    <td colspan="3"> No Order Item </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                        <h3>Order Delivery</h3>

                        <table class="table">
                            <thead>
                            <th>Date Added</th>
                            <th>Status</th>
                            <th>Comment</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>07/12/2017</td>
                                <td>Pending</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                    </div><!--Table Responsive-->
                    <div class="con-btn">
                        <a href="order-history.php">Back to List</a>
                    </div><!--Submit Btn-->
                </div><!--Order History-->
            </div><!-- Column 9  -->
        </div><!-- Row  -->
    </div><!-- Container -->
</div><!-- Dash Board -->


<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>


</body>
</html>
