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

if(isset($_REQUEST['eseal_id']))
{
    $eseal_id=$_REQUEST['eseal_id'];
}
else
{
    exit;
}

$order_sql="SELECT poi.*, `exporter_info`.`name_exporter`, products.product_name
FROM `product_order_info` AS `poi`
LEFT JOIN `product_order` ON product_order.id = poi.product_order_id
LEFT JOIN `products` ON products.id = poi.product_id
LEFT JOIN `exporter_info` ON exporter_info.id = product_order.product_exporter_id
where poi.product_sealcode = $eseal_id";
$order_exe=mysql_query($order_sql);
$order_cnt=@mysql_num_rows($order_exe);
$order_fet=mysql_fetch_array($order_exe);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customs Admin Panel </title>
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
                View Eseal
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Eseal</li>
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
                            <h3 class="box-title">View Eseal Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Exporter Name</label>
                                        <div class="col-sm-9"><div class=""><?php echo $order_fet['name_exporter']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">IEC Code</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $order_fet['iec_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Gst Number</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $order_fet['gst_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Pan Number</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['pan_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Unicode</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['product_unicode']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product SealCode</label>
                                        <div class="col-sm-9"><div class=""><?php echo $order_fet['product_sealcode']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Seal Date</label>
                                        <div class="col-sm-9"><div class=""><?php echo $order_fet['sealing_date']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Seal Time</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $order_fet['sealing_time']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Shipping Bill Number</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['shipping_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Shipping Bill Date</label>
                                        <div class="col-sm-9"><div class=""><?php echo $order_fet['shipping_date']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Truck Number</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $order_fet['trailer_truck_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Number</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['driver_number']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Licence</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['driver_licence']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Name</label>
                                        <div class="col-sm-9"><div class=""><?php echo $order_fet['driver_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Container Size</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $order_fet['container_size']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Container Number</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['container_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Destination Customs Station</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['destination_port']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Terminal Name</label>
                                        <div class="col-sm-9"><div class=""><?php echo $order_fet['terminal_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Form 13 Number</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $order_fet['form_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">e-Way Bill Number</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['eway_no']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Seal Type</label>
                                        <div class="col-sm-9"><div class="" ><?php if($order_fet['seal_type'] == 1) { echo "Direct2Port"; } else { echo "CFS ICD"; } ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">CFS Reach Time</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['cfs_reach_time']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Notes</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $order_fet['notes']; ?></div></div>
                                    </div>

                                    <fieldset class="form-group col-md-12">
                                        <legend>Customs Details</legend>
                                        <?php if($order_fet['customs_approve_status'] == 1){ ?>
                                            <div class="form-group col-md-12">
                                                <label class="col-sm-3 control-label">Customs Approve Date</label>
                                                <div class="col-sm-9"><div class=""> <?php echo $order_fet['customs_approve_date']; ?></div></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-sm-3 control-label">Customs Approve Time</label>
                                                <div class="col-sm-9"><div class="" ><?php echo $order_fet['customs_approve_time'] ?></div></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-sm-3 control-label">Customs Approve Note</label>
                                                <div class="col-sm-9"><div class=""> <?php echo $order_fet['customs_approve_note']; ?></div></div>
                                            </div>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <div class="form-group col-md-12">
                                                <label class="col-sm-12 control-label">Waiting for the Customs Approval</label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </fieldset>
                                </div>
                                <div class="col-md-1"></div>
                            </div><!-- /.box-body -->
                        </form>
                        <?php if($order_fet['customs_approve_status'] == 0){ ?>
                        <div class="row">
                            <div class="col-xs-6">

                            <form action="doesealupdate.php" method="get">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group has-feedback">
                                        <input name="product_sealcode" type="hidden" class="form-control" value="<?php echo $order_fet['product_sealcode']; ?>" required />
                                        <input name="customs_approve_status" type="hidden" class="form-control" value="1" required />
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <button name="eseal_accept" type="submit" class="btn btn-success btn-block btn-flat">Accept</button>
                                </div><!-- /.col -->
                                <div class="col-xs-4">
                                    <div class="form-group has-feedback">
                                    </div>
                                </div>
                            </div>
                            </form>
                                <br/><br/>
                            </div>
                            <div class="col-xs-6">

                            <form action="doesealupdate.php" method="get">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group has-feedback">
                                            <input name="product_sealcode" type="hidden" class="form-control" value="<?php echo $order_fet['product_sealcode']; ?>" required />
                                            <input name="customs_approve_status" type="hidden" class="form-control" value="2" required />
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <button name="eseal_decline" type="submit" class="btn btn-danger btn-block btn-flat">Decline</button>
                                    </div><!-- /.col -->
                                    <div class="col-xs-4">
                                        <div class="form-group has-feedback">
                                        </div>
                                    </div>
                                </div>
                            </form>
<br/><br/>
                            </div>
                        </div>
                        <?php } ?>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

                <!-- right column -->
                <div class="col-md-3">
                    <!-- Horizontal Form -->
                    <div class="box box-danger" >
                        <div class="box-header with-border">
                            <h3 class="box-title">Eseal</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <a href="eseallist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Eseal List</button></a>
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
</body>
</html>
