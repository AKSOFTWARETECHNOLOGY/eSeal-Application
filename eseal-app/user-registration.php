<?php session_start();
ob_start();

if(isset($_SESSION['exporteruserid']))
{
    header("Location: dashboard.php");
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

$country_sql="SELECT * FROM `countries` where `country_status`=1 AND `id`=99";
$country_exe=mysql_query($country_sql);
$country_results = array();
while($row1 = mysql_fetch_assoc($country_exe)) {
    array_push($country_results, $row1);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration </title>
    <link href="images/favicon.png" type="image/png" rel="shortcut icon">
    <link href="css/style-inner.css" type="text/css" rel="stylesheet">

    <link href="ssga/css/style.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="ssga/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="ssga/js/bootstrap.min.js"></script>
</head>

<body>

<?php //include "top_header.php"; ?>

<?php //include "header.php"; ?>

<?php include "header-new.php"; ?>



<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>User Registration</h3>
</div>
</div>


<div class="contact-us">
<div class="container">
<div class="row">
    <h3>User Registration</h3><br/>



<form name="registerform" id="registerform" action="doregister.php" method="post">
<div class="col-md-12 col-sm-12 col-xs-12 address">
<div class="account-register">
    <?php if(isset($_REQUEST['success'])) { ?>
        <p style="color:green;font-weight:bold"> Your Account Activated Successfully! You can login now.</p>
    <?php } ?>

    <?php if(isset($_REQUEST['err'])) { ?>
        <p style="color:red;font-weight:bold"> E-Mail Already Registered with us / Invalid Details.</p>
    <?php } ?>


    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Email Id <span class="required">*</span></label>
                <input type="text" name="email" id="email" class="register-input" value="" required />
                <span id="emailstatus"></span>
                <span>(This will become your default registered email)</span>
            </div>
        </div><!-- Inner Column -->

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Password <span class="required">*</span></label>
                <input type="password" name="password" id="password" class="register-input" value="" required />
                <span>( The password should be atleast 5 charaters long )</span>
            </div>
        </div><!-- Inner Column -->
    </div><!-- Inner Row -->

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Mobile No. <span class="required">*</span></label>
                <input type="text" name="mobile" id="mobile" class="register-input" maxlength="10" value="" required />
            </div>
        </div><!-- Inner Column -->

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Landline Number <span class="required">&nbsp;</span></label>
                <input type="text" name="telephone" id="telephone" class="register-input " maxlength="11" value="" />
            </div>
        </div><!-- Inner Column -->
    </div><!-- Inner Row -->

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label>Name of Exporter <span class="required">*</span></label>
        <input type="text" name="exporterName" class="register-input" value="" placeholder="Name of Exporter" required />
        <p>(please fill in the name as it appears in official IEC records)</p>
    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label>IEC Code <span class="required">*</span></label>
        <input type="text" name="icecode" id="icecode" class="register-input" maxlength="10" value="" placeholder="IEC Code" required />
        <span id="icecodestatus"></span>
        <p>(IEC Code is unique 10 character code issued by DGFT)</p>
    </div>
</div>
</div>

<p>Address(as per IEC records)</p>
<div class="other-fields">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Country <span class="required">*</span></label>
<select class="register-input" name="countryId" id="countryId" required >
    <option value="">Select Country</option>
    <?php
    foreach($country_results as $key => $value){ ?>
        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
    <?php
    }
    ?>
</select>
</div>
</div><!-- Inner Column -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label>Name Of Contact Person <span class="required">*</span></label>
<input type="text" name="personName" class="register-input" value="" placeholder="Name Of Contact Person" required />
</div>
</div><!-- Inner Column -->
</div><!-- Inner Row -->


<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="form-group">
<label>Address <span class="required">*</span></label>
<textarea name="address" id="address" placeholder="Address" class="register-input" required></textarea>
</div>
</div><!-- Inner Column -->

</div><!-- Inner Row -->


<div class="row">

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>Pincode <span class="required">*</span></label>
<input type="text" name="pincode" id="pincode" class="register-input" maxlength="6" value="" required />
</div>
</div><!-- Inner Column -->

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>City <span class="required">*</span></label>
<select class="register-input" name="cityId" id="cityId" required>
    <option value="">Select City</option>
    <?php
    foreach($city_results as $key => $value){ ?>
        <option value="<?php echo $value['id']; ?>"><?php echo $value['city_name']; ?></option>
    <?php
    }
    ?>
</select>
</div>
</div><!-- Inner Column -->


<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>State <span class="required">*</span></label>


<select class="register-input" name="state" id="state" required>
    <option value="">Select State</option>
    <?php
    foreach($state_results as $key => $value){ ?>
        <option value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['state_name']); ?></option>
    <?php
    }
    ?>
</select>
</div>
</div><!-- Inner Column -->

</div><!-- Inner Row -->



<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>Pan Number <span class="required">*</span></label>
<input type="text" name="panNumber" id="panNumber" class="register-input" maxlength="10" value="" required/>
</div>
</div><!-- Inner Column -->

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>GSTIN <span class="required">*</span></label>
<input type="text" name="gstin" id="gstin" class="register-input" maxlength="15" value="" required/>
</div>
</div><!-- Inner Column -->

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
<label>Aadhaar Number <span class="required">&nbsp;</span></label>
<input type="text" name="AadhaarNumber" id="AadhaarnNumber" class="register-input" maxlength="12" value="" />
</div>
</div><!-- Inner Column -->

</div><!-- Inner Row -->
</div>






<div class="declare">
<h4>We declare that we are entitled for self-sealing facility as per circular 26/2017 and 36/2017 and belong to one of the following permitted categories:</h4>
<ul>
<li>Exporters newly granted permission for self-sealing;</li>
<li>Exporters who were already operating under self-sealing procedure;</li>
<li>Exporters who were permitted factory stuffing facility; or</li>
<li>Authorized Economic Operator</li>
</ul>
</div>

<div class="form-group last-otp">
<input type="submit" name="register" value="Submit">
</div>


</div>
</div>
</form>





</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->




<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

<script>
    $("input#email").change(function(){

        //alert("The text has been changed.");

        var email = $("input#email").val();
        var BASEURL = "http://www.ssgaeseal.com/";
        //var BASEURL = "http://localhost/eSeal-Application/single-product-updated-eseal/";
        var BASEURL = "";
        var status = 1;
        var callurl = BASEURL + 'ajax-check-email.php?email='+email;

        $.ajax({
            url: callurl,
            type: "get",
            data: {"email": email, "status": status},
            success: function (data) {
                var obj = JSON.parse(data);
                //alert(obj.status);
                if(obj.status==1)
                {
                    $("#emailstatus").text("");
                }
                else if(obj.status==2)
                {
                    $("input#email").val("");
                    $("#emailstatus").text(obj.email+" Email Already Taken!");
                }

                /*
                $("input#DeliveryName").val(obj.name);
                $("input#DeliveryMobile").val(obj.mobile);
                $("textarea#DeliveryAddress").val(obj.address);
                $("select#DeliveryCountry").val(obj.country);
                $("select#DeliveryState").val(obj.state);
                $("select#DeliveryCity").val(obj.city);
                $("input#DeliveryPin").val(obj.pincode);
                */

            }
        });

    });
</script>

<script>
    $("input#icecode").change(function(){

        //alert("The text has been changed.");

        var icecode = $("input#icecode").val();
        var BASEURL = "http://www.ssgaeseal.com/";
        //var BASEURL = "http://localhost/eSeal-Application/single-product-updated-eseal/";
        var BASEURL = "";
        var status = 1;
        var callurl = BASEURL + 'ajax-check-ieccode.php?icecode='+icecode;

        $.ajax({
            url: callurl,
            type: "get",
            data: {"icecode": icecode, "status": status},
            success: function (data) {
                var obj = JSON.parse(data);
                //alert(obj.status);
                if(obj.status==1)
                {
                    $("#icecodestatus").text("");
                }
                else if(obj.status==2)
                {
                    $("input#icecode").val("");
                    $("#icecodestatus").text(obj.icecode+" IEC Code Already Taken!");
                }

                /*
                 $("input#DeliveryName").val(obj.name);
                 $("input#DeliveryMobile").val(obj.mobile);
                 $("textarea#DeliveryAddress").val(obj.address);
                 $("select#DeliveryCountry").val(obj.country);
                 $("select#DeliveryState").val(obj.state);
                 $("select#DeliveryCity").val(obj.city);
                 $("input#DeliveryPin").val(obj.pincode);
                 */

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

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form#registerform").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                role: "required",
                exporterName: {
                    required: true,
                    lettersonly: true
                },
                icecode: {
                    required: true,
                    alphanumeric: true,
                    minlength: 10,
                    maxlength: 10,
                },
                gstin: {
                    required: true,
                    minlength: 15,
                    maxlength: 15,
                },
                panNumber: {
                    required: true,
                    alphanumeric: true,
                    minlength: 10,
                    maxlength: 10,
                },
                AadhaarNumber: {
                    number: true,
                    minlength: 12,
                    maxlength: 12,
                },
                personName: {
                    required: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 15,
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                telephone: {
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                pincode: {
                    number: true,
                    minlength: 6,
                    maxlength: 6
                },
                cityId: "required",
                state: "required",
                countryId: "required",
                address: "required",
            },
            // Specify validation error messages
            messages: {
                role: "Please choose role",
                exporterName: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                icecode: {
                    required: "Please provide a valid ICE Code",
                    minlength: "Your IEC Code must be 10 characters long",
                    maxlength: "Your IEC Code must be 10 characters long"
                },
                gstin: {
                    required: "Please provide a valid GST Number",
                    minlength: "Your GST Number must be 15 characters long",
                    maxlength: "Your GST Number must be 15 characters long"
                },
                panNumber: {
                    required: "Please provide a valid Pan Card Details",
                    minlength: "Your Pan Card must be 10 characters long",
                    maxlength: "Your Pan Card must be 10 characters long"
                },
                AadhaarNumber: {
                    minlength: "Your Aadhaar number must be 12 characters long",
                    maxlength: "Your Aadhaar number must be 12 characters long"
                },
                personName: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                email: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    maxlength: "Your password must be at maximum 15 characters long"
                },
                mobile: {
                    required: "Please provide a valid mobile number",
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 10 characters long"
                },
                telephone: {
                    minlength: "Your Landline number must be 11 characters long",
                    maxlength: "Your Landline number must be 11 characters long"
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
<style>
    label.error { color: red; }
    span.required { color: red; float: right;  padding: 5px 0px 0px 5px; }
    span#emailstatus { color: red; }
    span#icecodestatus { color: red; }
</style>
</body>
</html>
