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

if(isset($_REQUEST['support_id']))
{
    $support_id=$_REQUEST['support_id'];
}
else
{
    exit;
}

$support_sql="SELECT si.*, `countries`.`name` AS country_name, cities.city_name, states.state_name, users.delete_status
FROM `support_info` AS `si`
LEFT JOIN `users` ON users.id = si.user_id
LEFT JOIN `countries` ON countries.id = si.country
LEFT JOIN `cities` ON cities.id = si.city
LEFT JOIN `states` ON states.id = si.state
WHERE `si`.id = $support_id";
$support_exe=mysql_query($support_sql);
$support_cnt=@mysql_num_rows($support_exe);
$support_fet=mysql_fetch_array($support_exe);

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
                View Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">View Users Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <a href="supporterslist.php" style="float: right;margin-right: 10px;"><button type="button" class="btn btn-info btn-md" style="margin-bottom:10px;" >Back to Users List</button></a>
                                        <a href="supportersedit.php?support_id=<?php echo $support_fet['id']; ?>" style="float: right;margin-right: 10px;"><button type="button" class="btn btn-warning btn-md" style="margin-bottom:10px;"><i class="fa fa-pencil"></i> Edit</button></a>

                                        <?php
                                        if($support_fet['delete_status'] == 1){
                                            ?>
                                            <a href="supporters-delete.php?delete=1&support_id=<?php echo $support_fet['user_id']; ?>" style="float: right;margin-right: 10px;" onclick="return confirm('Are you sure you want to disable this item?');"><button type="button" class="btn btn-danger btn-md"><i class="fa fa-trash-o"></i> Disable</button></a>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <a href="supporters-delete.php?enable=1&support_id=<?php echo $support_fet['user_id']; ?>" style="float: right;margin-right: 10px;" onclick="return confirm('Are you sure you want to enable this item?');"><button type="button" class="btn btn-success btn-md"><i class="ion ion-pie-graph"></i> Enable</button></a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Users Code</label>
                                            <div class="col-sm-7"><div class=""> <?php echo $support_fet['support_code']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Users Name</label>
                                            <div class="col-sm-7"><div class=""><?php echo $support_fet['name_support']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Address</label>
                                            <div class="col-sm-7"><div class=""> <?php echo $support_fet['address']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">City</label>
                                            <div class="col-sm-7"><div class=""><?php echo $support_fet['city_name']; ?></div></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">State</label>
                                            <div class="col-sm-7"><div class="" ><?php echo $support_fet['state_name']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Country</label>
                                            <div class="col-sm-7"><div class=""> <?php echo $support_fet['country_name']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Pincode</label>
                                            <div class="col-sm-7"><div class=""> <?php echo $support_fet['pincode']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Telephone</label>
                                            <div class="col-sm-7"><div class="" ><?php echo $support_fet['telephone']; ?></div></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Mobile</label>
                                            <div class="col-sm-7"><div class=""> <?php echo $support_fet['mobile']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Email</label>
                                            <div class="col-sm-7"><div class=""><?php echo $support_fet['email']; ?></div></div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-5 control-label">Status</label>
                                            <div class="col-sm-7">
                                                <div class="">
                                                    <?php if($support_fet['delete_status'] == 1)
                                                    {?>
                                                        <button type="button" class="btn btn-success btn-xs">Active</button>
                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <button type="button" class="btn btn-danger btn-xs">Inactive</button>
                                                    <?php
                                                    }?>
                                                </div>
                                            </div>
                                        </div>
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
                            <h3 class="box-title">Users</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <a href="supporterslist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Users List</button></a>
                                <a href="supportersedit.php?support_id=<?php echo $support_fet['id']; ?>"><button type="button" class="btn btn-danger col-md-12" style="margin-bottom:10px;"><i class="fa fa-pencil"></i> Edit</button></a>

                                <?php
                                if($support_fet['delete_status'] == 1){
                                    ?>
                                    <a href="supporters-delete.php?delete=1&support_id=<?php echo $support_fet['user_id']; ?>" onclick="return confirm('Are you sure you want to disable this item?');"><button type="button" class="btn btn-warning col-md-12"><i class="fa fa-trash-o"></i> Disable</button></a>
                                <?php
                                }
                                else{
                                    ?>
                                    <a href="supporters-delete.php?enable=1&support_id=<?php echo $support_fet['user_id']; ?>" onclick="return confirm('Are you sure you want to enable this item?');"><button type="button" class="btn btn-success col-md-12"><i class="ion ion-pie-graph"></i> Enable</button></a>
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
