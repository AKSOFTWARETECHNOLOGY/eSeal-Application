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


$product_exporter_id=$user_id;
$product_info_order_sql="SELECT poi.*, `exporter_info`.`name_exporter`, products.product_name, ports.ports_name, terminals.terminals_name
FROM `product_order_info` AS `poi`
LEFT JOIN `product_order` ON product_order.id = poi.product_order_id
LEFT JOIN `products` ON products.id = poi.product_id
LEFT JOIN `exporter_info` ON exporter_info.user_id = product_order.product_exporter_id
LEFT JOIN `ports` ON ports.id = poi.destination_port
LEFT JOIN `terminals` ON terminals.id = poi.terminal_name
 WHERE poi.product_exporter_id='$product_exporter_id' AND poi.product_item_status='1'";
$product_info_order_exe=mysql_query($product_info_order_sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Order E-Seal History</title>
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
    <h3><i class="fa fa-pencil-square" aria-hidden="true"></i> My E-Seal Status Information</h3>

    <?php if(isset($_REQUEST['success'])) { ?>
        <p style="color:green;font-weight:bold"> E-Seal Details Updated.</p>
    <?php } ?>

    <?php if(isset($_REQUEST['err'])) { ?>
        <p style="color:red;font-weight:bold"> E-Seal Details Not Updated, Try Again.</p>
    <?php } ?>
    <div class="table-responsive">
        <table id="myTable" class="display table">
            <thead>
                <tr>
                    <th>SL.NO</th>
                    <th class="hidden">EXPORTER NAME</th>
                    <th>E-SEAL NUMBER</th>
                    <th>STATUS</th>
                    <th class="hidden">IEC CODE</th>
                    <th class="hidden">DESTINATION STATION</th>
                    <th class="hidden">SEAL DATE AND TIME</th>
                    <th class="hidden">TERMINAL NAME</th>
                    <th class="hidden">SHIPPING BILL NUMBER</th>
                    <th class="hidden">SHIPPING BILL DATE</th>
                    <th class="hidden">CONTAINER NUMBER</th>
                    <th class="hidden">TRUCK NUMBER</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php if(mysql_num_rows($product_info_order_exe)>0) { ?>
                <?php $sl=0; ?>
                <?php while($product_info_order_fet=mysql_fetch_array($product_info_order_exe)) { ?>
                <?php $sl++; ?>
                    <tr>
                        <td><?php //print_r($product_info_order_fet); ?><?php echo $sl; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['name_exporter']; ?></td>
                        <td><?php echo $product_info_order_fet['product_sealcode']; ?></td>
                        <td><?php
                            if($product_info_order_fet['customs_approve_status']==0) { echo "Pending"; }
                            else if($product_info_order_fet['customs_approve_status']==1) { echo "Success"; }
                            else if($product_info_order_fet['customs_approve_status']==2) { echo "Tampered"; }
                            else {  echo "Others"; }?>
                        </td>
                        <td class="hidden"><?php echo $product_info_order_fet['iec_no']; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['ports_name'];; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['sealing_date'] . " " . $product_info_order_fet['sealing_time'];; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['terminals_name']; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['shipping_no']; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['shipping_date']; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['container_no']; ?></td>
                        <td class="hidden"><?php echo $product_info_order_fet['trailer_truck_no']; ?></td>
                        <td>
                            <?php if($product_info_order_fet['product_item_status']==0) { ?>
                                <a href="update-eseal.php?id=<?php echo $product_info_order_fet['id']; ?>">UPDATE SEAL</a>
                            <?php } else {  ?>
                                <a href="view-eseal.php?id=<?php echo $product_info_order_fet['id']; ?>">VIEW SEAL</a>
                            <?php } ?>
                        </td>
                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="3"> No Order Item </td>
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
