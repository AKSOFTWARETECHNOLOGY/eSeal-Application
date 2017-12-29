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

if(isset($_REQUEST['customs_id']))
{
    $customs_id=$_REQUEST['customs_id'];
}
else
{
    exit;
}

$custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, states.state_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `states` ON states.id = ci.state
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal
WHERE `ci`.id = $customs_id";
$custom_exe=mysql_query($custom_sql);
$custom_cnt=@mysql_num_rows($custom_exe);
$custom_fet=mysql_fetch_array($custom_exe);
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
                View Customs
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Customs</li>
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
                            <h3 class="box-title">View Customs Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Customs Code</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $custom_fet['customs_code']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Customs Name</label>
                                        <div class="col-sm-9"><div class=""><?php echo $custom_fet['name_customs']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $custom_fet['address']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">City</label>
                                        <div class="col-sm-9"><div class=""><?php echo $custom_fet['city_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">State</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $custom_fet['state_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Country</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $custom_fet['country_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Pincode</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $custom_fet['pincode']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Telephone</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $custom_fet['telephone']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $custom_fet['mobile']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9"><div class=""><?php echo $custom_fet['email']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Port</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $custom_fet['ports_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Terminal</label>
                                        <div class="col-sm-9"><div class=""><?php echo $custom_fet['terminals_name']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9"><div class="">
                                                <?php if($custom_fet['delete_status'] == 1)
                                                {?>
                                                    <button type="button" class="btn btn-success btn-xs">Active</button>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Inactive</button>
                                                <?php
                                                }?>
                                            </div></div>
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
                            <h3 class="box-title">Customs</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <a href="customslist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Customs List</button></a>
                                <a href="customsedit.php?customs_id=<?php echo $custom_fet['id']; ?>"><button type="button" class="btn btn-danger col-md-12" style="margin-bottom:10px;"><i class="fa fa-pencil"></i> Edit</button></a>

                                <?php
                                if($custom_fet['delete_status'] == 1){
                                    ?>
                                    <a href="customs-delete.php?delete=1&customs_id=<?php echo $custom_fet['user_id']; ?>" onclick="return confirm('Are you sure you want to disable this item?');"><button type="button" class="btn btn-warning col-md-12"><i class="fa fa-trash-o"></i> Disable</button></a>
                                <?php
                                }
                                else{
                                    ?>
                                    <a href="customs-delete.php?enable=1&customs_id=<?php echo $custom_fet['user_id']; ?>" onclick="return confirm('Are you sure you want to enable this item?');"><button type="button" class="btn btn-success col-md-12"><i class="ion ion-pie-graph"></i> Enable</button></a>
                                <?php
                                }
                                ?>


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
