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

$order_sql="SELECT poi.*, `exporter_info`.`name_exporter`, products.product_name, ports.ports_name,terminals.terminals_name
FROM `product_order_info` AS `poi`
LEFT JOIN `product_order` ON product_order.id = poi.product_order_id
LEFT JOIN `products` ON products.id = poi.product_id
LEFT JOIN `exporter_info` ON exporter_info.user_id = product_order.product_exporter_id
LEFT JOIN `ports` ON ports.id = poi.destination_port
LEFT JOIN `terminals` ON terminals.id = poi.terminal_name
where poi.id = $eseal_id";
$order_exe=mysql_query($order_sql);
$order_cnt=@mysql_num_rows($order_exe);
$order_fet=mysql_fetch_array($order_exe);



$attachment_sql="SELECT * FROM `eseal_attachment` WHERE `eseal_id`='$eseal_id' AND `eseal_attachment_status`='1'";
$attachment_exe=mysql_query($attachment_sql);
$attachment_cnt=mysql_num_rows($attachment_exe);
?>
<!DOCTYPE html>
<html>
<head>
    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
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
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Eseal</li>
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
                            <h3 class="box-title hidden">View Eseal Details</h3>
                        </div><!-- /.box-header -->
                        <div class="form-group col-md-12">
                            <a href="eseallist.php"><button type="button" class="btn btn-info col-md-2" style="margin-bottom:10px;float:right;" >Back to E-Seal List</button></a>
                        </div>

                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Exporter Name</label>
                                            <div class="col-sm-6"><div class=""><?php echo $order_fet['name_exporter']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">IEC Code</label>
                                            <div class="col-sm-6"><div class="" ><?php echo $order_fet['iec_no']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">GST Number</label>
                                            <div class="col-sm-6"><div class="" ><?php echo $order_fet['gst_no']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">PAN Number</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['pan_no']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">E-Seal Number</label>
                                            <div class="col-sm-6"><div class=""><?php echo $order_fet['product_sealcode']; ?></div></div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Seal Date</label>
                                            <div class="col-sm-6"><div class=""><?php echo $order_fet['sealing_date']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Seal Time</label>
                                            <div class="col-sm-6"><div class="" ><?php echo $order_fet['sealing_time']; ?></div></div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Shipping Bill Number</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['shipping_no']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Shipping Bill Date</label>
                                            <div class="col-sm-6"><div class=""><?php echo $order_fet['shipping_date']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Truck Number</label>
                                            <div class="col-sm-6"><div class="" ><?php echo $order_fet['trailer_truck_no']; ?></div></div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Container Size</label>
                                            <div class="col-sm-6"><div class="" ><?php echo $order_fet['container_size']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Container Number</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['container_no']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Destination Customs Station</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['ports_name']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Terminal Name</label>
                                            <div class="col-sm-6"><div class=""><?php echo $order_fet['terminals_name']; ?></div></div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Driver Number</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['driver_number']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Driver Licence</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['driver_licence']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Driver Name</label>
                                            <div class="col-sm-6"><div class=""><?php echo $order_fet['driver_name']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Form 13 Number</label>
                                            <div class="col-sm-6"><div class="" ><?php echo $order_fet['form_no']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">e-Way Bill Number</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['eway_no']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Seal Type</label>
                                            <div class="col-sm-6"><div class="" ><?php if($order_fet['seal_type'] == 1) { echo "Direct2Port"; } else { echo "CFS ICD"; } ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">CFS Reach Time</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['cfs_reach_time']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-6 control-label">Notes</label>
                                            <div class="col-sm-6"><div class=""> <?php echo $order_fet['notes']; ?></div></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <fieldset class="form-group col-md-12">
                                        <legend>Document Details</legend>
                                        <div class="form-group">
                                        <span class="account-input">
                                         <?php if($attachment_cnt>0) { ?>

                                             <?php while($attachment_fet=mysql_fetch_array($attachment_exe)) { ?>
                                                 <a href="<?php echo $attachment_fet['eseal_attachment_path']; ?>" target="_blank">
                                                     <?php echo $attachment_fet['eseal_attachment_name']; ?>
                                                     <i class="fa fa-download"></i>
                                                 </a>
                                                 <br/>
                                             <?php } ?>

                                         <?php } ?>
                                         </span>
                                        </div>

                                </div><!-- Inner Row -->

                                <div class="row">
                                    <fieldset class="form-group col-md-12">
                                        <legend>Customs Details</legend>
                                        <?php if($order_fet['customs_approve_status'] == 1){ ?>
                                            <div class="form-group col-md-12">
                                                <label class="col-sm-3 control-label">Date of Reading</label>
                                                <div class="col-sm-9"><div class=""> <?php echo $order_fet['customs_approve_date']; ?></div></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-sm-3 control-label">Time of Reading</label>
                                                <div class="col-sm-9"><div class="" ><?php echo $order_fet['customs_approve_time'] ?></div></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-sm-3 control-label">E-Seal Status</label>
                                                <div class="col-sm-9"><div class=""><?php
                                                        if($order_fet['customs_approve_status']==0) { ?>
                                                            <button type="button" class="btn btn-warning btn-xs">Pending</button>
                                                        <?php
                                                        }
                                                        else if($order_fet['customs_approve_status']==1) { ?>
                                                            <button type="button" class="btn btn-success btn-xs">Success</button>
                                                        <?php }
                                                        else if($order_fet['customs_approve_status']==2) { ?>
                                                            <button type="button" class="btn btn-danger btn-xs">Tampered</button>
                                                        <?php }?></div></div>
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
                            </div><!-- /.box-body -->
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
