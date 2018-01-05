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


$port_sql="SELECT * FROM `ports` where `ports_status`=1";
$port_exe=mysql_query($port_sql);
$port_results = array();
while($row1 = mysql_fetch_assoc($port_exe)) {
    array_push($port_results, $row1);
}


$terminal_sql="SELECT * FROM `terminals` where `terminals_status`=1";
$terminal_exe=mysql_query($terminal_sql);
$terminal_results = array();
while($row2 = mysql_fetch_assoc($terminal_exe)) {
    array_push($terminal_results, $row2);
}


$userinfo_sql="SELECT * FROM `exporter_info` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);
$userinfo=mysql_fetch_array($userinfo_exe);


$product_info_order_id=$_REQUEST['id'];
$product_info_order_sql="SELECT * FROM `product_order_info` WHERE `id`='$product_info_order_id' AND `product_exporter_id`='$user_id'";
$product_info_order_exe=mysql_query($product_info_order_sql);
$product_info_order_fet=mysql_fetch_array($product_info_order_exe);
//print_r($product_info_order_fet);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>e-Seal Update</title>
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
/*
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
*/
</script>
</head>

<body>

<?php //include "top_header.php"; ?>

<?php //include "header.php"; ?>

<?php include "header-app.php"; ?>

<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>Address Book Entries</h3>
</div>
</div>


<div class="dashboard">
<div class="container-fluid">
<div class="row">

<div class="col-md-3 col-sm-3 col-xs-12">
<?php include "sidebar.php"; ?>
</div><!--Column 6-->

<div class="col-md-9 col-sm-9 col-xs-12">
    <div class="submit-btn">
        <ul>
            <li><a class="hidden" href="#">New Complaint</a></li>
            <li><a class="" href="my-seal.php">Back</a></li>
        </ul>
    </div><!--Form Btn-->
<div class="my-account">
<h3><i class="fa fa-address-book" aria-hidden="true"></i> e-Seal Update Entries</h3>
<div class="address-bar">
<div class="row">


    <form name="sealform" id="sealform" action="doeseal.php" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
        <div class="col-md-12 col-sm-12 col-xs-12 address">
            <div class="account-register" style="padding: 0px;">
                <?php if(isset($_REQUEST['insert'])) { ?>
                <?php if(isset($_REQUEST['success'])) { ?>
                    <p style="color:green;font-weight:bold"> Your Address Added Successfully!</p>
                <?php } ?>

                <?php if(isset($_REQUEST['error'])) { ?>
                    <p style="color:red;font-weight:bold"> Invalid Details.</p>
                <?php } ?>
                <?php } ?>

                <?php //print_r($product_info_order_fet); ?>
                 <div class="other-fields">
                     <div class="row">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <label>Exporter Name </label>
                                 <span class="account-input">
                                 <?php echo $userinfo['name_exporter']; ?>
                                 </span>
                             </div>
                         </div><!-- Inner Column -->
                     </div>
                     <div class="row">
                         <div class="col-md-4 col-sm-4 col-xs-12">
                             <div class="form-group">
                                 <label>IEC Code </label>
                                 <span class="account-input">
                                 <?php echo $userinfo['iec_code']; ?>
                                 <input type="hidden" name="iec_no" id="iec_no" class="register-input" value="<?php echo $userinfo['iec_code']; ?>" required />
                                 </span>
                             </div>
                         </div><!-- Inner Column -->
                         <div class="col-md-4 col-sm-4 col-xs-12">
                             <div class="form-group">
                                 <label>Pan Number </label>
                                 <span class="account-input">
                                 <?php echo $userinfo['pan_number']; ?>
                                 <input type="hidden" name="pan_no" id="pan_no" class="register-input" value="<?php echo $userinfo['pan_number']; ?>" required />
                                 </span>
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-4 col-sm-4 col-xs-12">
                             <div class="form-group">
                                 <label>GST Number </label>
                                 <span class="account-input">
                                 <?php echo $userinfo['gstin']; ?>
                                 <input type="hidden" name="gst_no" id="gst_no" class="register-input" value="<?php echo $userinfo['gstin']; ?>" required />
                                 </span>
                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->
                     <div class="row">

                         <div class="col-md-4 col-sm-4 col-xs-12">
                             <div class="form-group">
                                 <label>E-Seal Number *</label>
                                 <span class="account-input">
                                 <?php echo $product_info_order_fet['product_sealcode']; ?>
                                 </span>
                             </div>
                         </div><!-- Inner Column -->

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Seal Date *</label>
                                <input type="date" name="sealing_date" id="sealing_date" class="register-input" value="<?php echo $product_info_order_fet['sealing_date']; ?>" required />
                            </div>
                        </div><!-- Inner Column -->

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Seal Time *</label>
                                <input type="time" name="sealing_time" id="sealing_time" class="register-input" value="<?php echo $product_info_order_fet['sealing_time']; ?>" required />
                            </div>
                        </div><!-- Inner Column -->
                    </div><!-- Inner Row -->
                     <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Shipping Bill Number *</label>
                                 <input type="text" name="shipping_no" id="shipping_no" class="register-input" value="<?php echo $product_info_order_fet['shipping_no']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Shipping Bill Date *</label>
                                 <input type="date" name="shipping_date" id="shipping_date" class="register-input" value="<?php echo $product_info_order_fet['shipping_date']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->


                     <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Truck Number *</label>
                                 <input type="text" name="trailer_truck_no" id="trailer_truck_no" class="register-input" value="<?php echo $product_info_order_fet['trailer_truck_no']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Driver Number *</label>
                                 <input type="text" name="driver_number" id="driver_number" class="register-input" value="<?php echo $product_info_order_fet['driver_number']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->
                     <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Driver Licence *</label>
                                 <input type="text" name="driver_licence" id="driver_licence" class="register-input" value="<?php echo $product_info_order_fet['driver_licence']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Driver Name *</label>
                                 <input type="text" name="driver_name" id="driver_name" class="register-input" value="<?php echo $product_info_order_fet['driver_name']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->

                     <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Container Size *</label>
                                 <input type="text" name="container_size" id="container_size" class="register-input" value="<?php echo $product_info_order_fet['container_size']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Container Number *</label>
                                 <input type="text" name="container_no" id="container_no" class="register-input" value="<?php echo $product_info_order_fet['container_no']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->


                     <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Destination Customs Station *</label>
                                 <!--
                                 <input type="text" name="destination_port" id="destination_port" class="register-input" value="" required />
                                 -->
                                 <select class="register-input" name="destination_port" id="destination_port" required>
                                     <option value="">Select Port</option>
                                     <?php
                                     foreach($port_results as $key => $value){ ?>
                                         <option value="<?php echo $value['id']; ?>" <?php if($product_info_order_fet['destination_port']==$value['id']) { echo "selected"; } ?> ><?php echo $value['ports_name']; ?></option>
                                     <?php
                                     }
                                     ?>
                                 </select>
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Terminal Name *</label>
                                 <!--
                                 <input type="text" name="terminal_name" id="terminal_name" class="register-input" value="" required />
                                 -->
                                 <select class="register-input" name="terminal_name" id="terminal_name" required>
                                     <option value="">Select Terminal</option>
                                     <?php
                                     foreach($terminal_results as $key => $value){ ?>
                                         <option value="<?php echo $value['id']; ?>" <?php if($product_info_order_fet['terminal_name']==$value['id']) { echo "selected"; } ?> ><?php echo $value['terminals_name']; ?></option>

                                     <?php
                                     }
                                     ?>
                                 </select>

                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->


                     <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Form 13 Number </label>
                                 <input type="text" name="form_no" id="form_no" class="register-input" value="<?php echo $product_info_order_fet['form_no']; ?>" />
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>e-Way Bill Number </label>
                                 <input type="text" name="eway_no" id="eway_no" class="register-input" value="<?php echo $product_info_order_fet['eway_no']; ?>" />
                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->


                     <div class="row">
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Seael Type *</label>
                                 <!--
                                 <input type="text" name="seal_type" id="seal_type" class="register-input" value="" required />
                                 -->
                                 <select class="register-input" name="seal_type" id="seal_type" required onchange="javascript:sealtype(this.value)">
                                     <option value="">Select Type</option>
                                     <option value="1" <?php if($product_info_order_fet['seal_type']==1) { echo "selected"; } ?> >Direct2Port</option>
                                     <option value="2" <?php if($product_info_order_fet['seal_type']==2) { echo "selected"; } ?>>CFS ICD</option>
                                 </select>
                             </div>
                         </div><!-- Inner Column -->

                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>CFS Reach Time </label>
                                 <input type="time" name="cfs_reach_time" id="cfs_reach_time" class="register-input" value="<?php echo $product_info_order_fet['cfs_reach_time']; ?>" required />
                             </div>
                         </div><!-- Inner Column -->
                     </div><!-- Inner Row -->

                     <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>GOODS Type *</label>
                                <textarea name="notes" id="notes" placeholder="Notes" class="register-input" required><?php echo $product_info_order_fet['notes']; ?></textarea>
                            </div>
                        </div><!-- Inner Column -->

                    </div><!-- Inner Row -->


                     <div class="row">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <label>Documents : Support File Format [jpeg, jpg, png, pdf, doc, docx]</label>

                                 <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>

                                 <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                 <input type="submit" value="Upload File" name="submit" id="upload" class="upload hidden"/>                             </div>
                         </div><!-- Inner Column -->

                     </div><!-- Inner Row -->




                </div>






                <div class="row">

                  <div class="form-group last-otp">
                      <input type="hidden" name="id" id="id" class="register-input" value="<?php echo $product_info_order_fet['id']; ?>" required />

                    <input type="submit" name="addseal" id="upload" value="Submit">
                </div>


            </div>
        </div>
    </form>



</div><!--Inner Row-->
</div><!--Address Bar-->
</div><!--My Account-->

<div class="submit-btn hidden">
<ul>
<li><a href="javascript:void(0);">Back</a></li>
<li><a href="javascript:void(0);">New Address</a></li>
</ul>
</div><!--Form Btn-->

</div><!-- Column 9  -->
</div><!-- Row  -->
</div><!-- Container -->
</div><!-- Dash Board -->

<?php //include "footer.php"; ?>

<?php //include "bottom_footer.php"; ?>

<?php include "footer-app.php"; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="multiple_image_upload/script.js"></script>
<!-------Including CSS File------>
<link rel="stylesheet" type="text/css" href="multiple_image_upload/style.css">

<script>
    function sealtype(TypeValue)
    {

        if(TypeValue==1)
        {
            $("#cfs_reach_time").removeAttr('required');

        }
        else if(TypeValue==2)
        {
            $("#cfs_reach_time").attr('required');
        }
        else
        {
            $("#cfs_reach_time").removeAttr('required');
        }

    }
</script>
<script>
    function validate(form) {

        // validation code here ...


        if(!valid) {
            alert('Please correct the errors in the form!');
            return false;
        }
        else {
            return confirm('Do you really want to submit the form?');
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<script>
    // Wait for the DOM to be ready
    $(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        });

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form#sealform").validate({
            // Specify validation rules
            rules: {
                seal_type: "required",
                shipping_no: "required",
                shipping_date: "required",
                sealing_date: "required",
                sealing_time: "required",
                destination_port: "required",
                terminal_name: "required",
                container_size: "required",
                container_no: "required",
                trailer_truck_no: "required",
                driver_name: "required",
                driver_licence: "required",
                driver_number: "required",
                form_no: "required",
                eway_no: "required",
            },
            // Specify validation error messages
            messages: {
                seal_type: "Please choose your Seal Type",
                shipping_no: "Please enter your Shipping Number",
                shipping_date: "Please enter your Shipping Date",
                sealing_date: "Please enter your Sealing Date",
                sealing_time: "Please enter your Sealing Time",
                destination_port: "Please choose your Port Details",
                terminal_name: "Please enter your Terminal Name",
                container_size: "Please enter your Container Size",
                container_no: "Please enter your Container Number",
                trailer_truck_no: "Please enter your Truck Number",
                driver_name: "Please enter your Driver Name",
                driver_licence: "Please enter your Driver Licence",
                driver_number: "Please enter your Driver Number",
                form_no: "Please enter your Form 13 Number",
                eway_no: "Please enter your e-Way Bill Number",

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
</style>

</body>
</html>
