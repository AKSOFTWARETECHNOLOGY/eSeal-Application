<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$city_sql="SELECT * FROM `cities` where `city_status`=1";
$city_exe=mysql_query($city_sql);
$city_results = array();
while($row = mysql_fetch_assoc($city_exe)) {
    array_push($city_results, $row);
}

$state_sql="SELECT * FROM `states` where `state_status`=1";
$state_exe=mysql_query($state_sql);
$state_results = array();
while($row = mysql_fetch_assoc($state_exe)) {
    array_push($state_results, $row);
}

$country_sql="SELECT * FROM `countries` where `country_status`=1";
$country_exe=mysql_query($country_sql);
$country_results = array();
while($row1 = mysql_fetch_assoc($country_exe)) {
    array_push($country_results, $row1);
}

$user_id=$_SESSION['adminuserid'];
$user_role=$_SESSION['adminuserrole'];
$user_name=$_SESSION['adminusername'];
$user_email=$_SESSION['adminuseremail'];
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
                Add New Exporter
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Customs</li>
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
                            <h3 class="box-title">Add New Customs</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="doaddcustoms.php" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>

                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Customs Code<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="customscode" id="customscode" value="" maxlength="10" required />
                                            <div class="err" id="errcustomscode" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Customs Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="customsName" id="customsName" value="" required/>
                                            <div class="err" id="errCustomsName" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Address<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" id="address" required></textarea>
                                            <div class="err" id="errAddress" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">City<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="cityId" id="cityId" required>
                                                <option value="0">Select City</option>
                                                <?php
                                                foreach($city_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['city_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="err" id="errCity" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">State<span class="req"> *</span></label>
                                        <div class="col-sm-9">

                                            <select class="form-control" name="state" id="state" required>
                                                <option value="">Select State</option>
                                                <?php
                                                foreach($state_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['state_name']); ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="err" id="errState" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Country<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="countryId" id="countryId" required>
                                                <option value="0">Select Country</option>
                                                <?php
                                                foreach($country_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="err" id="errCountry" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="telephone" id="telephone" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="mobile" id="mobile" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Email <span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="email" name="email" id="email" value="" required />
                                            <div class="err" id="errEmail" style="color:red"></div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat add-customs">Save Changes</button>
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
