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


$user_brancher_sql="SELECT * FROM `brancher_info` WHERE `exporter_id`='$user_id'";
$user_brancher_exe=mysql_query($user_brancher_sql);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Team Members</title>
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
<h3>My Team Members</h3>
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
<h3><i class="fa fa-address-book" aria-hidden="true"></i> My Team Members</h3>


    <?php if(isset($_REQUEST['delete'])) { ?>
        <?php if(isset($_REQUEST['success'])) { ?>
            <p style="color:green;font-weight:bold"> Your Account Delete Successfully!.</p>
        <?php } ?>

        <?php if(isset($_REQUEST['error'])) { ?>
            <p style="color:red;font-weight:bold"> Your Account Not Deleted.</p>
        <?php } ?>
    <?php } ?>

    <div class="submit-btn">
        <ul>
            <li><a class="hidden" href="javascript:void(0);">Back</a></li>
            <li><a href="add-team-member.php">New Team Member</a></li>
        </ul>
    </div><!--Form Btn-->

    <div class="table-responsive">

        <table id="myTable" class="display table">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>

            <th></th>
            </thead>
            <tbody>
            <?php if(mysql_num_rows($user_brancher_exe)>0) { ?>
                <?php while($user_brancher_fet=mysql_fetch_array($user_brancher_exe)) { ?>
                    <?php
                    $city_value = $user_brancher_fet['city'];
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

                    $state_value = $user_brancher_fet['state'];
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

                    $country_value = $user_brancher_fet['country'];
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

                    <tr>
                        <td><?php echo $user_brancher_fet['name_person']; ?></td>
                        <td><?php echo $user_brancher_fet['email']; ?></td>
                        <td>
                            <?php echo $user_brancher_fet['address']; ?>,<br/>
                            <?php echo $city_name; ?>,<?php echo $state_name; ?>,<br/>
                            <?php echo $country_name; ?> - <?php echo $user_brancher_fet['pincode']; ?>

                        </td>
                        <td><?php echo $user_brancher_fet['mobile']; ?></td>
                        <td>
                            <a class="hidden" href="javascript:void(0);">Edit</a>
                            <a href="delete-team.php?delete=1&id=<?php echo $user_brancher_fet['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                        </td>
                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="3"> No Order Item </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div><!--Table Responsive-->



</div><!--My Account-->

<div class="submit-btn hidden">
<ul>
<li><a class="hidden" href="javascript:void(0);">Back</a></li>
<li><a href="add-team-member.php">New Team Member</a></li>
</ul>
</div><!--Form Btn-->

</div><!-- Column 9  -->
</div><!-- Row  -->
</div><!-- Container -->
</div><!-- Dash Board -->

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>



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
