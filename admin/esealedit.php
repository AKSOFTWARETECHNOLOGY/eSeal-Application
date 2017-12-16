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
where poi.id = $eseal_id";
$order_exe=mysql_query($order_sql);
$order_cnt=@mysql_num_rows($order_exe);
$order_fet=mysql_fetch_array($order_exe);

$port_sql="SELECT * FROM `ports` where `ports_status`=1";
$port_exe=mysql_query($port_sql);
$port_results = array();
while($row1 = mysql_fetch_assoc($port_exe)) {
    array_push($port_results, $row1);
}
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
                Edit Eseal
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Eseal</li>
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
                            <h3 class="box-title">Edit Eseal Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="doupdateeseal.php?eseal_id=<?php echo $order_fet['id']; ?>" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Exporter Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="exporterName" id="exporterName" value="<?php echo $order_fet['name_exporter'];?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">IEC Code<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="iecCode" id="iecCode" value="<?php echo $order_fet['iec_no']; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">GST Number<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="gstnum" id="gstnum" value="<?php echo $order_fet['gst_no']; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Pan Number<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="panNumber" id="panNumber" value="<?php echo $order_fet['pan_no']; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">SSG Code<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="unicode" id="unicode" value="<?php echo $order_fet['product_unicode']; ?>" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Seal Code<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="sealcode" id="sealcode" value="<?php echo $order_fet['product_sealcode']; ?>" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Seal Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="sealdate" id="sealdate" value="<?php echo $order_fet['sealing_date']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Seal Time</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="time" name="sealtime" id="sealtime" value="<?php echo $order_fet['sealing_time']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Shipping Bill Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="billnum" id="billnum" value="<?php echo $order_fet['shipping_no']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Shipping Bill Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" name="billdate" id="billdate" value="<?php echo $order_fet['shipping_date']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Truck Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="trucknum" id="trucknum" value="<?php echo $order_fet['trailer_truck_no']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="drivername" id="drivername" value="<?php echo $order_fet['driver_name']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="drivernumber" id="drivernumber" value="<?php echo $order_fet['driver_number']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Driver Licence</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="driverlicence" id="driverlicence" value="<?php echo $order_fet['driver_licence']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Container Size</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="containersize" id="containersize" value="<?php echo $order_fet['container_size']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Container Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="containernum" id="containernum" value="<?php echo $order_fet['container_no']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Destination Customs Station</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="destination_port" id="destination_port" required>
                                                <option value="">Select Port</option>
                                                <?php
                                                foreach($port_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id'] == $order_fet['destination_port']){ echo 'selected'; } ?>><?php echo $value['ports_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Terminal Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="terminalname" id="terminalname" value="<?php echo $order_fet['terminal_name']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Form 13 Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="formno" id="formno" value="<?php echo $order_fet['form_no']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">e-Way Bill Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="ewayno" id="ewayno" value="<?php echo $order_fet['eway_no']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Seal Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="seal_type" id="seal_type">
                                                <option value="">Select Type</option>
                                                <option value="1" <?php if($order_fet['seal_type'] == 1){echo 'selected';} ?>>Direct2Port</option>
                                                <option value="2" <?php if($order_fet['seal_type'] == 2){echo 'selected';} ?>>CFS ICD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">CFS Reach Time</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="time" name="cfsReach" id="cfsReach" value="<?php echo $order_fet['cfs_reach_time']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Notes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="notes" id="notes"> <?php echo $order_fet['notes']; ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="userId" value="<?php echo $order_fet['user_id']; ?>" />
                                        <button type="submit" class="btn btn-primary btn-block btn-flat save-eseal">Save Changes</button>
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
