<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$user_role=$_SESSION['adminuserrole'];
$user_name=$_SESSION['adminusername'];
$user_email=$_SESSION['adminuseremail'];


if(isset($_REQUEST['orderinfo_id']))
{
    $orderinfo_id=$_REQUEST['orderinfo_id'];
}
else
{
    exit;
}

$product_sql="SELECT product_order_info.*, products.product_name, exporter_info.name_exporter FROM `product_order_info`
LEFT JOIN `product_order` ON product_order.id = product_order_info.product_order_id
LEFT JOIN `products` ON products.id = product_order.product_id
LEFT JOIN `exporter_info` ON exporter_info.id = product_order.product_exporter_id
WHERE `product_order_info`.id = $orderinfo_id";
$product_exe=mysql_query($product_sql);
$product_cnt=@mysql_num_rows($product_exe);
$product_fet=mysql_fetch_array($product_exe);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel </title>
    <?php include "head1.php"; ?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php include "header.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Product Order
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Product Order</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">View Product Order</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <?php
                                if($product_cnt>0)
                                {
                                    ?>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <tbody>
                                        <tr>
                                            <th>Exporter Name</th>
                                            <td> <?php echo $product_fet['name_exporter']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>GST Number</th>
                                            <td> <?php echo $product_fet['gst_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>IEC Number</th>
                                            <td> <?php echo $product_fet['iec_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pan Number</th>
                                            <td> <?php echo $product_fet['pan_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Product Unicode</th>
                                            <td> <?php echo $product_fet['product_unicode']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Product Sealcode</th>
                                            <td> <?php echo $product_fet['product_sealcode']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Zone</th>
                                            <td> <?php echo $product_fet['zone']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Commission Rate Number</th>
                                            <td> <?php echo $product_fet['commissionerate']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Num</th>
                                            <td> <?php echo $product_fet['shipping_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Date</th>
                                            <td> <?php echo $product_fet['shipping_date']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sealing Date</th>
                                            <td> <?php echo $product_fet['sealing_date']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sealing Time</th>
                                            <td> <?php echo $product_fet['sealing_time']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Destination Port</th>
                                            <td> <?php echo $product_fet['destination_port']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Container Num</th>
                                            <td> <?php echo $product_fet['container_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Trailer Truck Num</th>
                                            <td> <?php echo $product_fet['trailer_truck_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Driver Name</th>
                                            <td> <?php echo $product_fet['driver_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Driver Licence</th>
                                            <td> <?php echo $product_fet['driver_licence']; ?></td>
                                        </tr>

                                        </tbody>

                                    </table>
                                <?php
                                }
                                else{
                                    ?>
                                    <p><b> Records are being updated. </b></p>
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php include "footer.php"; ?>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
</body>
</html>
