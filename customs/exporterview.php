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

if(isset($_REQUEST['exporter_id']))
{
    $exporter_id=$_REQUEST['exporter_id'];
}
else
{
    exit;
}

$export_sql="SELECT ei.*, `countries`.`name` AS country_name, cities.city_name, states.state_name
FROM `exporter_info` AS `ei`
LEFT JOIN `users` ON users.id = ei.user_id
LEFT JOIN `countries` ON countries.id = ei.country
LEFT JOIN `cities` ON cities.id = ei.city
LEFT JOIN `states` ON states.id = ei.state
WHERE `users`.delete_status = 1 and `ei`.id = $exporter_id";
$export_exe=mysql_query($export_sql);
$export_cnt=@mysql_num_rows($export_exe);
$export_fet=mysql_fetch_array($export_exe);
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
                View Exporter
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Exporter</li>
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
                            <h3 class="box-title">View Exporter Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="col-md-4">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Exporter Name</label>
                                        <div class="col-sm-6"><div class=""><?php echo $export_fet['name_exporter']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Person Name</label>
                                        <div class="col-sm-6"><div class="" ><?php echo $export_fet['name_person']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Address</label>
                                        <div class="col-sm-6"><div class=""> <?php echo $export_fet['address']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">City</label>
                                        <div class="col-sm-6"><div class=""><?php echo $export_fet['city_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">State</label>
                                        <div class="col-sm-6"><div class="" ><?php echo $export_fet['state_name']; ?></div></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Country</label>
                                        <div class="col-sm-6"><div class=""> <?php echo $export_fet['country_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Pincode</label>
                                        <div class="col-sm-6"><div class=""><?php echo $export_fet['pincode']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Telephone</label>
                                        <div class="col-sm-6"><div class="" ><?php echo $export_fet['telephone']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Mobile</label>
                                        <div class="col-sm-6"><div class=""> <?php echo $export_fet['mobile']; ?></div></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Email</label>
                                        <div class="col-sm-6"><div class=""><?php echo $export_fet['email']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Gst Number</label>
                                        <div class="col-sm-6"><div class="" ><?php echo $export_fet['gstin']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Pan Number</label>
                                        <div class="col-sm-6"><div class=""> <?php echo $export_fet['pan_number']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">IEC Code</label>
                                        <div class="col-sm-6"><div class=""> <?php echo $export_fet['iec_code']; ?></div></div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

                <!-- right column -->
                <div class="col-md-3 hidden">
                    <!-- Horizontal Form -->
                    <div class="box box-danger" >
                        <div class="box-header with-border">
                            <h3 class="box-title">Exporter</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <a href="exporterlist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Exporters List</button></a>
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
