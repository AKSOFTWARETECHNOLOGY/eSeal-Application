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


$userinfo_sql="SELECT * FROM `exporter_info` WHERE `user_id`='$user_id'";
$userinfo_exe=mysql_query($userinfo_sql);
$userinfo=mysql_fetch_array($userinfo_exe);



if(isset($_REQUEST['enquiry_id']))
{
    $enquiry_id=$_REQUEST['enquiry_id'];
}
else
{
    exit;
}
$date = date("Y-m-d");

$sql = "UPDATE `complaint_enquiry` SET `read_status` = '1', `updated_by` = '$user_name', `updated_at` = '$date'
            WHERE `complaint_enquiry`.`id` = '$enquiry_id'";
$exe = mysql_query($sql);

$complaint_sql="SELECT complaint_enquiry.*, vendor_info.name_vendor, vendor_info.vendor_code, exporter_info.name_exporter, exporter_info.iec_code FROM `complaint_enquiry`
LEFT JOIN `vendor_info` ON vendor_info.user_id = complaint_enquiry.receiver_id
LEFT JOIN `exporter_info` ON exporter_info.user_id = complaint_enquiry.sender_id
 WHERE complaint_enquiry.complaint_status = 1 and complaint_enquiry.enquiry_id = 0 AND `complaint_enquiry`.`id` = '$enquiry_id'";

$complaint_exe=mysql_query($complaint_sql);
$complaint_cnt=@mysql_num_rows($complaint_exe);
$complaint_fet=mysql_fetch_array($complaint_exe);

$conversation_sql = "SELECT complaint_enquiry.* FROM `complaint_enquiry`
 WHERE complaint_enquiry.complaint_status = 1 and complaint_enquiry.enquiry_id = $enquiry_id";
$conversation_exe=mysql_query($conversation_sql);
$conversation_cnt=@mysql_num_rows($conversation_exe);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Complaint</title>
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
<h3>My Complaint</h3>
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
            <li><a class="hidden" href="complaint-form.php">New Complaint</a></li>
            <li><a class="" href="my-complaint.php">Back</a></li>
        </ul>
    </div><!--Form Btn-->
<div class="order-history">
    <h3><i class="fa fa-pencil-square" aria-hidden="true"></i> View Complaint Information</h3>
<style>
    .col-md-12.conversationhead {
        border: 1px solid #ccc;
    }
    .col-md-12.conversation {
        border: 1px solid #ccc;
    }
</style>

    <div class="col-md-12 conversationhead">
        <div class="col-md-12">
            <br/>
            <div class="form-group col-md-12">
                <label class="col-sm-6 control-label">Subject</label>
                <div class="col-sm-6"><div class="" ><?php echo $complaint_fet['subject']; ?></div></div>
            </div>
            <div class="form-group col-md-12 hidden">
                <label class="col-sm-6 control-label">Exporter Name</label>
                <div class="col-sm-6"><div class=""><?php echo $complaint_fet['name_exporter']; ?></div></div>
            </div>
            <div class="form-group col-md-12 hidden">
                <label class="col-sm-6 control-label">IEC Code</label>
                <div class="col-sm-6"><div class="" ><?php echo $complaint_fet['iec_code']; ?></div></div>
            </div>
        </div>

        <div class="col-md-12 hidden">
            <div class="form-group col-md-6">
                <label class="col-sm-6 control-label">Vendor Name</label>
                <div class="col-sm-6">
                    <div class=""><?php echo $complaint_fet['name_vendor']; ?></div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="col-sm-6 control-label">Vendor Code</label>
                <div class="col-sm-6"><div class="" ><?php echo $complaint_fet['vendor_code']; ?></div></div>
            </div>
        </div>
    </div>

    <?php
    if($conversation_cnt>0)
    {
        while($conversation_fet=mysql_fetch_array($conversation_exe)) {
            ?>
            <div class="col-md-12 conversation"  style="min-height: 50px;">
                <br/>
                <div class="col-md-1" style='text-align: right;'>
                    <?php
                    //print_r($conversation_fet);
                    if($conversation_fet['sender_id'] == 2)
                    {
                        echo "<b>Admin::</b>";
                    }
                    else{
                        echo "<b>Exporter::</b>";
                    }
                    ?>
                </div>
                <div class="col-md-11">
                    <br/>
                    <h4 class="control-label hidden"><?php echo $conversation_fet['subject']; ?></h4>
                    <p><?php echo $conversation_fet['message']; ?></p>
                </div>
            </div>
        <?php
        }
    }
    ?>

    <div class="col-md-12"><br/></div>
    <div class="col-md-12">

        <form role="form" action="doreplyenquiry.php?enquiry_id=<?php echo $complaint_fet['id']; ?>" method="post">
            <div class="col-md-12 other-fields">
                <div class="form-group col-md-12">
                    <input class="form-control" type="text" value="<?php echo "Re:" . $complaint_fet['subject']; ?>"  readonly/>
                </div>
                <div class="form-group col-md-12">
                    <textarea class="form-control" placeholder="message" name="message"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <input class="form-control" type="hidden" name="subject" value="<?php echo $complaint_fet['subject']; ?>"/>
                    <input class="form-control" type="hidden" name="receiverId" value="<?php echo $complaint_fet['sender_id']; ?>"/>
                    <button class="btn btn-info form-group" type="submit">Reply</button>
                </div>
            </div>
        </form>

    </div>




</div><!--Order History-->
</div><!-- Column 9  -->
</div><!-- Row  -->
</div><!-- Container -->
</div><!-- Dash Board -->

<?php //include "footer.php"; ?>

<?php //include "bottom_footer.php"; ?>

<?php include "footer-app.php"; ?>

<?php /* ?>
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
<?php */ ?>
</body>
</html>
