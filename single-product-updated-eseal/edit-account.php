<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
    header("Location: login.php");
}

include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];

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

$userinfo_sql="SELECT * FROM `exporter_info` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);
$userinfo=mysql_fetch_array($userinfo_exe);


$city_value = $userinfo['city'];
$cityArray_values = array_filter($city_results, function($e) use ($city_value){

    if($e['id'] == $city_value)
    { return true; }
    else
    { return false; }

});

if(count($cityArray_values))
{
    $cityArray_values_key = key($cityArray_values);
    $city_name = $cityArray_values[$cityArray_values_key]['city_name'];
}
else
{
    $city_name = "";
}

$state_value = $userinfo['state'];
$stateArray_values = array_filter($state_results, function($e) use ($state_value){

    if($e['id'] == $state_value)
    { return true; }
    else
    { return false; }

});

if(count($stateArray_values))
{
    $stateArray_values_key = key($stateArray_values);
    $state_name = $stateArray_values[$stateArray_values_key]['state_name'];
}
else
{
    $state_name = "";
}

$country_value = $userinfo['country'];
$countryArray_values = array_filter($country_results, function($e) use ($country_value){

    if($e['id'] == $country_value)
    { return true; }
    else
    { return false; }

});

if(count($countryArray_values))
{
    $countryArray_values_key = key($countryArray_values);
    $country_name = $countryArray_values[$countryArray_values_key]['name'];
}
else
{
    $country_name = "";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Account</title>
<link href="images/favicon.png" type="image/png" rel="shortcut icon">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
<link href="css/jquery.accordion.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="js/jquery.accordion.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
				autoplay:true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  600: {
                    items:2,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  1000: {
                    items: 2,
                    nav: true,
                    loop: false,
                    margin: 20,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  }
                }
              })
			  
			  $('.bxslider').bxSlider({
			mode: 'horizontal',
			moveSlides: 1,
			slideMargin: 40,
			infiniteLoop: true,
			slideWidth:550,
			minSlides:1,
			maxSlides:2,
			speed: 800,
			//auto:true,
		});
			  
			  
	$(window).scroll(function(){
  var sticky = $('.main-header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});


        $('#only-one [data-accordion]').accordion();

        $('#multiple [data-accordion]').accordion({
          singleOpen: false
        });

        $('#single[data-accordion]').accordion({
          transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
          transitionSpeed: 200
        });
      
			  
            });
</script>
</head>

<body>

<?php include "top_header.php"; ?>

<?php include "header.php"; ?>


<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>Edit Account</h3>
</div>
</div>


<div class="dashboard">
<div class="container">
<div class="row">

<div class="col-md-3 col-sm-3 col-xs-12">
<?php include "sidebar.php"; ?>
</div><!--Column 6-->

<div class="col-md-9 col-sm-9 col-xs-12">
<div class="my-account">
<h3><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Account Information</h3>

    <?php if(isset($_REQUEST['success'])) { ?>
        <p style="color:green;font-weight:bold"> Your Account Details Updated Successfully!</p><br/>
    <?php } ?>

    <?php if(isset($_REQUEST['error'])) { ?>
        <p style="color:red;font-weight:bold"> Your Account Details Not Updated.</p><br/>
    <?php } ?>

<h4>Edit Your Account Details</h4>

<form name="profileform" id="profileform"  action="doaccount.php" method="post">

    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Exporter Name <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <input type="text" name="name_exporter" placeholder="Exporter Name" class="account-input" value="<?php echo $userinfo['name_exporter']; ?>" required />

        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Exporter GST No <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <input type="text" name="gstin" placeholder="GST No" class="account-input" value="<?php echo $userinfo['gstin']; ?>" required />

        </div>
    </div>


    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Exporter Pan No <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <input type="text" name="pan_number" placeholder="PAN No" class="account-input" value="<?php echo $userinfo['pan_number']; ?>" required />

        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Person Name <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <input type="text" name="name_person" placeholder="PAN No" class="account-input" value="<?php echo $userinfo['name_person']; ?>" />

        </div>
    </div>


    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Address Details <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <textarea name="address" id="address" placeholder="Address" class="account-input" required><?php echo $userinfo['address']; ?></textarea>

        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>City <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <select class="register-input" name="city" required>
                <option value="">Select City</option>
                <?php
                foreach($city_results as $key => $value){ ?>
                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$userinfo['city']) { echo "selected"; } ?>  ><?php echo $value['city_name']; ?></option>
                <?php
                }
                ?>
            </select>

        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>State <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <select class="register-input" name="state" required>
                <option value="">Select State</option>
                <?php
                foreach($state_results as $key => $value){ ?>
                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$userinfo['state']) { echo "selected"; } ?> ><?php echo strtoupper($value['state_name']); ?></option>
                <?php
                }
                ?>
            </select>

        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Country <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <select class="register-input" name="country" required >
                <option value="">Select Country</option>
                <?php
                foreach($country_results as $key => $value){ ?>
                    <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$userinfo['country']) { echo "selected"; } ?> ><?php echo $value['name']; ?></option>
                <?php
                }
                ?>
            </select>

        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Pin Code <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <input type="text" name="pincode" placeholder="Pin Code" class="account-input" value="<?php echo $userinfo['pincode']; ?>" required />

        </div>
    </div>



    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Mobile No <span class="required">*</span></label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <input type="text" name="mobile" placeholder="Mobile No" class="account-input" value="<?php echo $userinfo['mobile']; ?>" required />

        </div>
    </div>


    <div class="form-group row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <label>Landline Number </label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <input type="text" name="telephone" placeholder="Phone No" class="account-input" value="<?php echo $userinfo['telephone']; ?>" />

        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="reset" value="Back" class="account-submit hidden" />
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 text-right">
            <input type="submit" name="profileupdate" value="Update" class="account-submit" />
        </div>
    </div>


</form>

</div><!--My Account-->
</div><!--Column 9-->

</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>


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
        $("form#profileform").validate({
            // Specify validation rules
            rules: {
                name_exporter: {
                    required: true,
                    lettersonly: true
                },
                gstin: {
                    required: true,
                    minlength: 15,
                    maxlength: 15,
                },
                pan_number: {
                    required: true,
                    alphanumeric: true,
                    minlength: 10,
                    maxlength: 10,
                },
                name_person: {
                    required: true,
                    lettersonly: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                telephone: {
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                pincode: "required",
                city: "required",
                state: "required",
                country: "required",
                address: "required",
            },
            // Specify validation error messages
            messages: {
                name_exporter: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                name_person: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
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
                pincode: "Please enter your Pincode",
                city: "Please choose your City",
                state: "Please choose your State",
                country: "Please choose your Country",
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
    span.required { color: red; float: right;  padding: 5px; }
</style>
</body>
</html>
