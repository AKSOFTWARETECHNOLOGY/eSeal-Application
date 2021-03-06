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



//$product_order_sql="SELECT * FROM `product_order` WHERE `product_exporter_id`='$user_id' ORDER BY `id` DESC";

$product_order_sql="SELECT `product_order`.*,`products`.`product_name` FROM `product_order`
LEFT JOIN `products` ON `product_order`.`product_id` = `products`.`id`
WHERE `product_order`.`product_exporter_id`='$user_id' AND `product_order`.`product_sale_status`=1
ORDER BY `product_order`.`id` DESC";

$product_order_exe=mysql_query($product_order_sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Order History</title>
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
/*
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
*/
</script>
</head>

<body>

<?php //include "top_header.php"; ?>

<?php //include "header.php"; ?>

<?php include "header-app.php"; ?>

<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>Order History</h3>
</div>
</div>


<div class="dashboard">
<div class="container-fluid">
<div class="row">

<div class="col-md-3 col-sm-3 col-xs-12">
<?php include "sidebar.php"; ?>
</div><!--Column 6-->

<div class="col-md-9 col-sm-9 col-xs-12">
<div class="order-history">
    <h3><i class="fa fa-pencil-square" aria-hidden="true"></i> My Order Information</h3>

    <div class="table-responsive">
<table id="myTable" class="display table">
<thead>
<th>Order ID</th>
<th>Customer</th>
<th>Product</th>
<th>No. of Products</th>
<th>Status</th>
<th>Grand Total</th>
<th>Date Added</th>
<th>View</th>
</thead>
<tbody>
<?php if(mysql_num_rows($product_order_exe)>0) { ?>
<?php while($product_order_fet=mysql_fetch_array($product_order_exe)) { ?>
<tr>
<td><?php echo $product_order_fet['product_order_id']; ?></td>
<td><?php echo $product_order_fet['product_delivery_name']; ?></td>
<td><?php echo $product_order_fet['product_name']; ?></td>
<td><?php echo $product_order_fet['product_sale_quantity']; ?></td>
<td><?php //echo $product_order_fet['product_sale_status']; ?>
    <?php if($product_order_fet['product_order_status'] == 0){
        ?>
        <button type="button" class="btn btn-warning btn-xs"> Order Placed </button>
    <?php
    }
    else if($product_order_fet['product_order_status'] == 1){
        ?>
        <button type="button" class="btn btn-info btn-xs"> Order Confirmed </button>
    <?php
    }
    else if($product_order_fet['product_order_status'] == 2){
        ?>
        <button type="button" class="btn btn-info btn-xs"> Order Packed </button>
    <?php
    }
    else if($product_order_fet['product_order_status'] == 3){
        ?>
        <button type="button" class="btn btn-info btn-xs"> Order Intransit </button>
    <?php
    }
    else if($product_order_fet['product_order_status'] == 4){
        ?>
        <button type="button" class="btn btn-success btn-xs"> Order Delivered </button>
    <?php
    }?>
</td>
<td>Rs.<?php echo $product_order_fet['product_sale_grand_total']; ?></td>
<td><?php echo $product_order_fet['product_sale_date']; ?></td>
<td><a href="order-history-details.php?order_id=<?php echo $product_order_fet['id']; ?>"><i class="fa fa-eye"></i></a></td>
</tr>

<?php } ?>

<?php } else { ?>

<tr>
<td colspan="7"> No Order </td>
</tr>
<?php } ?>
</tbody>
</table>
</div><!--Table Responsive-->
<div class="con-btn hidden">
<a href="javascript:void(0);">Continue</a>
</div><!--Submit Btn-->
</div><!--Order History-->
</div><!-- Column 9  -->
</div><!-- Row  -->
</div><!-- Container -->
</div><!-- Dash Board -->


<?php //include "footer.php"; ?>

<?php //include "bottom_footer.php"; ?>

<?php include "footer-app.php"; ?>

<?php /* ?>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css" />
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });

</script>
<?php */ ?>
<style>
    .table-responsive {
        min-height: .01%;
        overflow-x: visible;
    }
    div#myTable_length,  div#myTable_info{
        width: 50%;
        float: left;
    }
    div#myTable_filter, div#myTable_paginate{
        float: right;
    }
</style>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.print.min.js"></script>
<script>

    $(document).ready(function() {
        $('#myTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        } );
    } );

</script>

</body>
</html>
