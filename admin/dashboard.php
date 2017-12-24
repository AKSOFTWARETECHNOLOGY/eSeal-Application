<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
	header("Location: index.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";


$user_id=$_SESSION['adminuserid'];
$user_role=$_SESSION['adminuserrole'];
$user_name=$_SESSION['adminusername'];
$user_email=$_SESSION['adminuseremail'];


$exporter_sql="SELECT * FROM `exporter_info`
LEFT JOIN `users` ON users.id = exporter_info.user_id
WHERE users.delete_status='1'";
$exporter_exe=mysql_query($exporter_sql);
$exporter_cnt=@mysql_num_rows($exporter_exe);

$customs_sql="SELECT * FROM `customs_info`
LEFT JOIN `users` ON users.id = customs_info.user_id
WHERE users.delete_status='1'";
$custom_exe=mysql_query($customs_sql);
$custom_cnt=@mysql_num_rows($custom_exe);

$support_sql="SELECT * FROM `support_info`
LEFT JOIN `users` ON users.id = support_info.user_id
WHERE users.delete_status='1'";
$support_exe=mysql_query($support_sql);
$support_cnt=@mysql_num_rows($support_exe);

$product_sql="SELECT * FROM `product_info`
LEFT JOIN `products` ON products.id = product_info.product_id
WHERE products.product_status='1'";
$product_exe=mysql_query($product_sql);
$product_cnt=@mysql_num_rows($product_exe);

$product_sold_sql="SELECT * FROM `product_info`
LEFT JOIN `products` ON products.id = product_info.product_id
WHERE products.product_status='1' and product_info.product_sale_status = 1";
$product_sold_exe=mysql_query($product_sold_sql);
$product_sold_cnt=@mysql_num_rows($product_sold_exe);

$product_instock_sql="SELECT * FROM `product_info`
LEFT JOIN `products` ON products.id = product_info.product_id
WHERE products.product_status='1' and product_info.product_sale_status = 0";
$product_instock_exe=mysql_query($product_instock_sql);
$product_instock_cnt=@mysql_num_rows($product_instock_exe);

$product_order_sql="SELECT * FROM `product_order`
LEFT JOIN `products` ON products.id = product_order.product_id
WHERE products.product_status='1'";
$product_order_exe=mysql_query($product_order_sql);
$product_order_cnt=@mysql_num_rows($product_order_exe);

$product_order_placed_sql="SELECT * FROM `product_order`
LEFT JOIN `products` ON products.id = product_order.product_id
WHERE products.product_status='1' and product_order.product_order_status=0";
$product_order_placed_exe=mysql_query($product_order_placed_sql);
$product_order_placed_cnt=@mysql_num_rows($product_order_placed_exe);

$product_order_confirmed_sql="SELECT * FROM `product_order`
LEFT JOIN `products` ON products.id = product_order.product_id
WHERE products.product_status='1' and product_order.product_order_status=1";
$product_order_confirmed_exe=mysql_query($product_order_confirmed_sql);
$product_order_confirmed_cnt=@mysql_num_rows($product_order_confirmed_exe);

$product_order_packed_sql="SELECT * FROM `product_order`
LEFT JOIN `products` ON products.id = product_order.product_id
WHERE products.product_status='1' and product_order.product_order_status=2";
$product_order_packed_exe=mysql_query($product_order_packed_sql);
$product_order_packed_cnt=@mysql_num_rows($product_order_packed_exe);

$product_order_intransit_sql="SELECT * FROM `product_order`
LEFT JOIN `products` ON products.id = product_order.product_id
WHERE products.product_status='1' and product_order.product_order_status=3";
$product_order_intransit_exe=mysql_query($product_order_intransit_sql);
$product_order_intransit_cnt=@mysql_num_rows($product_order_intransit_exe);

$product_order_delivered_sql="SELECT * FROM `product_order`
LEFT JOIN `products` ON products.id = product_order.product_id
WHERE products.product_status='1' and product_order.product_order_status=4";
$product_order_delivered_exe=mysql_query($product_order_delivered_sql);
$product_order_delivered_cnt=@mysql_num_rows($product_order_delivered_exe);

$eseal_sql="SELECT * FROM `product_order_info`
LEFT JOIN `products` ON products.id = product_order_info.product_id
WHERE products.product_status='1' and product_order_info.product_item_status=1";
$eseal_exe=mysql_query($eseal_sql);
$eseal_cnt=@mysql_num_rows($eseal_exe);

$eseal_pending_sql="SELECT * FROM `product_order_info`
LEFT JOIN `products` ON products.id = product_order_info.product_id
WHERE products.product_status='1' and product_order_info.product_item_status=1 and product_order_info.customs_approve_status=0 ";
$eseal_pending_exe=mysql_query($eseal_pending_sql);
$eseal_pending_cnt=@mysql_num_rows($eseal_pending_exe);

$eseal_success_sql="SELECT * FROM `product_order_info`
LEFT JOIN `products` ON products.id = product_order_info.product_id
WHERE products.product_status='1' and product_order_info.product_item_status=1 and product_order_info.customs_approve_status=1";
$eseal_success_exe=mysql_query($eseal_success_sql);
$eseal_success_cnt=@mysql_num_rows($eseal_success_exe);

$eseal_tampered_sql="SELECT * FROM `product_order_info`
LEFT JOIN `products` ON products.id = product_order_info.product_id
WHERE products.product_status='1' and product_order_info.product_item_status=1 and product_order_info.customs_approve_status=2";
$eseal_tampered_exe=mysql_query($eseal_tampered_sql);
$eseal_tampered_cnt=@mysql_num_rows($eseal_tampered_exe);

$eseal_other_sql="SELECT * FROM `product_order_info`
LEFT JOIN `products` ON products.id = product_order_info.product_id
WHERE products.product_status='1' and product_order_info.product_item_status=1 and product_order_info.customs_approve_status=3";
$eseal_other_exe=mysql_query($eseal_other_sql);
$eseal_other_cnt=@mysql_num_rows($eseal_other_exe);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Panel | Dashboard</title>
    <?php include "head.php"; ?>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
	<?php include "header.php"; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $exporter_cnt;?></h3>
                  <p>Exporters</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-person"></i>
                </div>
                <a href="exporterlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

              <div class="col-lg-6 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                      <div class="inner">
                          <h3><?php echo $custom_cnt;?></h3>
                          <p>Customs</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-android-person"></i>
                      </div>
                      <a href="customslist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div><!-- ./col -->

              <div class="col-lg-4 col-xs-4 hidden">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                      <div class="inner">
                          <h3><?php echo $support_cnt;?></h3>
                          <p>Support</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-android-person"></i>
                      </div>
                      <a href="customslist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div><!-- ./col -->
			
          </div><!-- /.row -->


            <div class="row">
                <div class="col-lg-4 col-xs-4">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo $product_cnt;?></h3>
                            <p>Product Inventories</p>
                            <p>Sold <b><?php echo $product_sold_cnt;?></b></p>
                            <p>Instock <b><?php echo $product_instock_cnt;?></b></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-person"></i>
                        </div>
                        <a href="inventorieslist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-4 col-xs-4">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3><?php echo $product_order_cnt;?></h3>
                            <p>Product Order</p>
                            <p>Placed <b><?php echo $product_order_placed_cnt;?></b></p>
                            <p>Confirmed <b><?php echo $product_order_confirmed_cnt;?></b></p>
                            <p>Packed <b><?php echo $product_order_packed_cnt;?></b></p>
                            <p>Intransit <b><?php echo $product_order_intransit_cnt;?></b></p>
                            <p>Delivered <b><?php echo $product_order_delivered_cnt;?></b></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-person"></i>
                        </div>
                        <a href="orderlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-4 col-xs-4">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $eseal_cnt;?></h3>
                            <p>E-seal Status</p>
                            <p>Pending <b><?php echo $eseal_pending_cnt;?></b></p>
                            <p>Success <b><?php echo $eseal_success_cnt;?></b></p>
                            <p>Tampered <b><?php echo $eseal_tampered_cnt;?></b></p>
                            <p>Other <b><?php echo $eseal_other_cnt;?></b></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-person"></i>
                        </div>
                        <a href="eseallist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

            </div><!-- /.row -->
          <!-- Main row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    <?php include "footer.php"; ?>
	
    </div><!-- ./wrapper -->

    <?php include "foot.php"; ?>
  </body>
</html>
