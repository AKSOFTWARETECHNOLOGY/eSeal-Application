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
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .req{
            color : red;
        }
    </style>

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
                Edit Product Order
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Product Order</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Product Order Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="doupdateorderinfo.php?orderinfo_id=<?php echo $product_fet['id']; ?>" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Unicode<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="unicode" id="unicode" value="<?php echo $product_fet['product_unicode']; ?>" />
                                            <div class="err" id="errUnicode" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product SealCode<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="sealcode" id="sealcode" value="<?php echo $product_fet['product_sealcode']; ?>" />
                                            <div class="err" id="errSealCode" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Zone<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="zone" id="zone">
                                                <option value="0">Select Zone</option>
                                                <option value="1">Chennai</option>
                                                <option value="2">Ennore</option>
                                                <option value="3">Visakapattinam</option>
                                            </select>
                                            <div class="err" id="errZone" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Commission Rate</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="commission" id="commission" value="<?php echo $product_fet['commissionerate']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Shipping Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="shippingnum" id="shippingnum" value="<?php echo $product_fet['shipping_no']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Shipping Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="shippingdate" id="shippingdate" value="<?php echo $product_fet['shipping_date']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Sealing Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="sealingdate" id="sealingdate" value="<?php echo $product_fet['sealing_date']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Sealing Time</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="time" name="sealingtime" id="sealingtime" value="<?php echo $product_fet['sealing_time']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Destination Port<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="destinationport" id="destinationport">
                                                <option value="0">Select Zone</option>
                                                <option value="1">Chennai</option>
                                                <option value="2">Ennore</option>
                                                <option value="3">Visakapattinam</option>
                                            </select>
                                            <div class="err" id="errdestinationport" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Container Num</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="containernum" id="econtainernummail" value="<?php echo $product_fet['container_no']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Trailer Truck Num</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="trailer" id="trailer" value="<?php echo $product_fet['trailer_truck_no']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="drivername" id="drivername" value="<?php echo $product_fet['driver_name']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Licence</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="driverlicence" id="driverlicence" value="<?php echo $product_fet['driver_licence']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="productOrderId" value="<?php echo $product_fet['product_order_id']; ?>" />
                                        <button type="submit" class="btn btn-primary btn-block btn-flat save-orderinfo">Save Changes</button>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

                <!-- right column -->
                <div class="col-md-3">
                    <!-- Horizontal Form -->
                    <div class="box box-danger" >
                        <div class="box-header with-border">
                            <h3 class="box-title">Product Order</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <a href="orderview.php?order_id=<?php echo $product_fet['product_order_id']; ?>"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Product Order List</button></a>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
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

<script type="text/javascript">
    $(document).ready(function(){
        $(".save-orderinfo").click(function(){
            $("div.err").html( "  " );
            var unicode = $('#unicode').val();
            if(!unicode){
                $("div#errUnicode").html( "This field is required" );
                return false;
            }
            var sealcode = $('#sealcode').val();
            if(!sealcode){
                $("div#errSealCode").html( "This field is required" );
                return false;
            }
            var zone = $('#zone').val();
            if(zone == 0){
                $("div#errZone").html( "This field is required" );
                return false;
            }
            var destinationport = $('#destinationport').val();
            if(destinationport == 0){
                $("div#errdestinationport").html( "This field is required" );
                return false;
            }
        });
    });
</script>
</body>
</html>
