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

$custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, states.state_name
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `states` ON states.id = ci.state
WHERE `ci`.id = $customs_id";
$custom_exe=mysql_query($custom_sql);
$custom_cnt=@mysql_num_rows($custom_exe);
$custom_fet=mysql_fetch_array($custom_exe);

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

$port_sql="SELECT * FROM `ports` where `ports_status`=1";
$port_exe=mysql_query($port_sql);
$port_results = array();
while($portrow = mysql_fetch_assoc($port_exe)) {
    array_push($port_results, $portrow);
}

$terminal_sql="SELECT * FROM `terminals` where `terminals_status`=1";
$terminal_exe=mysql_query($terminal_sql);
$terminal_results = array();
while($terminalrow = mysql_fetch_assoc($terminal_exe)) {
    array_push($terminal_results, $terminalrow);
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .req, .error{
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
                Edit Customs
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Customs</li>
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
                            <h3 class="box-title">Edit Customs Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" id="editCustomsForm" action="doupdatecustoms.php?customs_id=<?php echo $custom_fet['id']; ?>" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Customs Code<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="customscode" id="customscode" value="<?php echo $custom_fet['customs_code']; ?>" maxlength="10" required />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Customs Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="customsName" id="customsName" value="<?php echo $custom_fet['name_customs']; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Address<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" id="address" required><?php echo $custom_fet['address']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">City<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="cityId" id="cityId" required>
                                                <option value="">Select City</option>
                                                <?php
                                                foreach($city_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id'] == $custom_fet['city']){ echo 'selected'; } ?>><?php echo $value['city_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">State<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="state" id="state" required>
                                                <option value="">Select State</option>
                                                <?php
                                                foreach($state_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"<?php if($value['id'] == $custom_fet['state']){ echo 'selected'; } ?>><?php echo strtoupper($value['state_name']); ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Country<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="countryId" id="countryId" required>
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach($country_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>" <?php if($value['id'] == $custom_fet['country']){ echo 'selected'; } ?>><?php echo $value['name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Pincode<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="pincode" id="pincode" value="<?php echo $custom_fet['pincode']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="telephone" id="telephone" value="<?php echo $custom_fet['telephone']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="mobile" id="mobile" value="<?php echo $custom_fet['mobile']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Email <span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="email" name="email" id="email" value="<?php echo $custom_fet['email']; ?>" required/>
                                            <span class="error" id="emailstatus"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Port</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="port" id="port">
                                                <option value="">Select Port</option>
                                                <?php
                                                foreach($port_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"<?php if($value['id'] == $custom_fet['port']){ echo 'selected'; } ?>><?php echo strtoupper($value['ports_name']); ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Terminal</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="terminal" id="terminal">
                                                <option value="">Select Terminal</option>
                                                <?php
                                                foreach($terminal_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"<?php if($value['id'] == $custom_fet['terminal']){ echo 'selected'; } ?>><?php echo strtoupper($value['terminals_name']); ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="userId" value="<?php echo $custom_fet['user_id']; ?>" />
                                        <button type="submit" class="btn btn-primary btn-block btn-flat save-customs">Save Changes</button>
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

<script>

    $("input#email").change(function(){
        var email = $("input#email").val();
        //var BASEURL = "http://www.ssgaeseal.com/";
        var BASEURL = "http://localhost/eSeal-Application/admin/";
        var status = 1;
        var callurl = BASEURL + 'ajax-check-email.php?email='+email;

        $.ajax({
            url: callurl,
            type: "get",
            data: {"email": email, "status": status},
            success: function (data) {
                var obj = JSON.parse(data);
                if(obj.status==1)
                {
                    $("#emailstatus").text("");
                }
                else if(obj.status==2)
                {
                    $("input#email").val("");
                    $("#emailstatus").text(obj.email+" Email Already Exists!");
                }
            }
        });

    });
</script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<script>
    // Wait for the DOM to be ready
    $(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
        });

        $("form#editCustomsForm").validate({
            // Specify validation rules
            rules: {
                customsName: {
                    required: true,
                    lettersonly: true
                },
                customscode: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                mobile: {
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                telephone: {
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                email: {
                    required: true
                },
                pincode: {
                    required: true,
                    number: true,
                    minlength: 6,
                    maxlength: 6
                },
                cityId: "required",
                state: "required",
                countryId: "required",
                address: "required"
            },
            // Specify validation error messages
            messages: {
                customsName: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                customscode: {
                    required: "Please provide a valid IEC code",
                    minlength: "Your IEC code must be 10 characters long",
                    maxlength: "Your IEC code must be 10 characters long"
                },
                mobile: {
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 10 characters long"
                },
                telephone: {
                    minlength: "Your Landline number must be 11 characters long",
                    maxlength: "Your Landline number must be 11 characters long"
                },
                email: {
                    required: "Please provide a valid email"
                },
                pincode: {
                    required: "Please provide a valid Pincode",
                    minlength: "Your Pincode must be 6 characters long",
                    maxlength: "Your Pincode must be 6 characters long"
                },
                cityId: "Please choose your City",
                state: "Please choose your State",
                countryId: "Please choose your Country",
                address: "Please enter your Address",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>
