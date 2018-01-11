<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
    header("Location: login.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];

if(isset($_REQUEST['id']))
{
    $address_id=$_REQUEST['id'];
}
else
{
    exit;
}



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


$useraddress_sql="SELECT * FROM `exporter_address` WHERE `user_id`='$user_id' AND `id`='$address_id'";
$useraddress_exe=mysql_query($useraddress_sql);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Address Book</title>
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

<script>
    $(document).ready(function() {
        // setTimeout() function will be fired after page is loaded
        // it will wait for 5 sec. and then will fire
        // $("#successMessage").hide() function
        setTimeout(function() {
            $("#successMessage").hide('blind', {}, 500)
        }, 5000);
    });
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
<div class="order-history">
<h3><i class="fa fa-address-book" aria-hidden="true"></i> Address Book Entries</h3>

    <div id="successMessage">
        <?php if(isset($_REQUEST['insert'])) { ?>
            <?php if(isset($_REQUEST['success'])) { ?>
                <p style="color:green;font-weight:bold"> Your Address Added Updated Successfully!.</p>
            <?php } ?>

            <?php if(isset($_REQUEST['error'])) { ?>
                <p style="color:red;font-weight:bold"> Your Address Not Added.</p>
            <?php } ?>
        <?php } ?>

        <?php if(isset($_REQUEST['update'])) { ?>
            <?php if(isset($_REQUEST['success'])) { ?>
                <p style="color:green;font-weight:bold"> Your Address Change Updated Successfully!.</p>
            <?php } ?>

            <?php if(isset($_REQUEST['error'])) { ?>
                <p style="color:red;font-weight:bold"> Your Address Changes Not Updated.</p>
            <?php } ?>
        <?php } ?>

        <?php if(isset($_REQUEST['delete'])) { ?>
            <?php if(isset($_REQUEST['success'])) { ?>
                <p style="color:green;font-weight:bold"> Your Address Status Changed Successfully!.</p>
            <?php } ?>

            <?php if(isset($_REQUEST['error'])) { ?>
                <p style="color:red;font-weight:bold"> Your Address Status Not Changed.</p>
            <?php } ?>
        <?php } ?>
    </div>



    <div class="submit-btn">
        <ul>
            <li><a class="hidden" href="javascript:void(0);">Back to List</a></li>
            <li><a href="address-book.php">Back to List</a></li>
        </ul>
    </div><!--Form Btn-->
    <?php if(mysql_num_rows($useraddress_exe)>0) { ?>
    <?php while($useraddress_fet=mysql_fetch_array($useraddress_exe)) { ?>
    <?php
    $city_value = $useraddress_fet['city'];
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

    $state_value = $useraddress_fet['state'];
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

    $country_value = $useraddress_fet['country'];
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

            <style>
                div.form-group label { width: 120px; font-weight: bold; }
            </style>
    <form name="addressform" id="addressform" action="#" method="post">
        <div class="col-md-12 col-sm-12 col-xs-12 address">
            <div class="account-register">

                <div class="other-fields">
                    <div class="row">


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label style="float: left; ">Address Status :: </label>
                                <input type="hidden" name="status" class="register-input" value="<?php echo $useraddress_fet['status']; ?>" placeholder="Name Of Contact Person" required />
                                <?php if($useraddress_fet['status']==1) { ?>
                                <span style="color:green;font-weight: bold;float: left;"> ACTIVE </span>
                                <?php } else { ?>
                                <span style="color:red;font-weight: bold;float: left;"> INACTIVE </span>
                                <?php } ?>
                                <br/>
                            </div>
                        </div><!-- Inner Column -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Contact Person :: </label>
                                <input type="hidden" name="personName" class="register-input" value="<?php echo $useraddress_fet['name']; ?>" placeholder="Name Of Contact Person" required />

                                <?php echo $useraddress_fet['name']; ?>

                            </div>
                        </div><!-- Inner Column -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mobile No :: </label>
                                <input type="hidden" name="mobile" id="mobile" class="register-input" value="<?php echo $useraddress_fet['mobile']; ?>" required />
                                <?php echo $useraddress_fet['mobile']; ?>
                            </div>
                        </div><!-- Inner Column -->
                    </div><!-- Inner Row -->


                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Address :: </label>
                                <textarea name="address" id="address" placeholder="Address" class="register-input hidden" required><?php echo $useraddress_fet['address']; ?></textarea>
                                <?php echo $useraddress_fet['address']; ?>
                            </div>
                        </div><!-- Inner Column -->

                    </div><!-- Inner Row -->


                    <div class="row">


                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>City :: </label>
                                <?php echo $city_name; ?>

                                <select class="register-input hidden" name="cityId" id="cityId" required>
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


                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>State :: </label>
                                <?php echo $state_name; ?>

                                <select class="register-input  hidden" name="state" id="state" required>
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


                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Country :: </label>
                                <?php echo $country_name; ?>

                                <select class="register-input hidden" name="countryId" id="countryId" required >
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
                                <label>Pincode :: </label>
                                <input type="hidden" name="pincode" id="pincode" class="register-input" value="<?php echo $useraddress_fet['pincode']; ?>" required />
                                <?php echo $useraddress_fet['pincode']; ?>
                            </div>
                        </div><!-- Inner Column -->






                    </div><!-- Inner Row -->




                </div>

            </div>
    </form>


            <div class="submit-btn hiddenX">
                <ul>
                    <li><a class="btn btn-info hiddenX" href="edit-address-book.php?id=<?php echo $useraddress_fet['id']; ?>">Edit</a></li>
                    <?php if($useraddress_fet['status']==1) { ?>
                    <li><a class="btn btn-warning hiddenX" href="delete-address.php?delete=0&id=<?php echo $useraddress_fet['id']; ?>" onclick="return confirm('Are you sure you want to disable this item?');">Disable</a></li>
                    <?php } else { ?>
                    <li><a class="btn btn-success hiddenX" href="delete-address.php?delete=1&id=<?php echo $useraddress_fet['id']; ?>" onclick="return confirm('Are you sure you want to enable this item?');">Enable</a></li>
                    <?php } ?>
                </ul>
            </div><!--Form Btn-->

        <?php } ?>
    <?php } ?>


</div><!--My Account-->


</div><!-- Column 9  -->
</div><!-- Row  -->
</div><!-- Container -->
</div><!-- Dash Board -->

<?php //include "footer.php"; ?>

<?php //include "bottom_footer.php"; ?>

<?php include "footer-app.php"; ?>

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css" />
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });

</script>
<style>
    .table-responsive {
        min-height: .01%;
        overflow-x: visible;
    }
    div#myTable_length,  div#myTable_info{
        width: 50%;
        float: left;
    }
    div#myTable_filter, div#myTable_paginate{
        float: right;
    }
</style>
</body>
</html>
