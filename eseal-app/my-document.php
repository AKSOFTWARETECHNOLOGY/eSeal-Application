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


//$attachment_sql="SELECT * FROM `eseal_attachment` WHERE `eseal_id`='$product_info_order_id' AND `eseal_attachment_status`='1'";

$attachment_sql="SELECT * FROM `exporter_attachment` WHERE `eseal_id`='$user_id' AND `eseal_attachment_status`='1'";
$attachment_exe=mysql_query($attachment_sql);
$attachment_cnt=mysql_num_rows($attachment_exe);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Documents</title>
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
<h3>My Documents</h3>
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
            <li><a class="" href="upload-document.php">Upload Document</a></li>
        </ul>
    </div><!--Form Btn-->
<div class="my-account">
<h3><i class="fa fa-address-book" aria-hidden="true"></i> My Documents</h3>
<div class="address-bar">
<div class="row">


    <form name="sealform" id="sealform" action="#doeseal.php" method="post" onsubmit="return validate(this);">
        <div class="col-md-12 col-sm-12 col-xs-12 address">
            <div class="account-register" style="padding: 0px;">
                <?php if(isset($_REQUEST['msg'])) { ?>
                <?php if(isset($_REQUEST['success'])) { ?>
                    <p style="color:green;font-weight:bold"> Your Documents Added Successfully!</p>
                <?php } ?>

                <?php if(isset($_REQUEST['error'])) { ?>
                    <p style="color:red;font-weight:bold"> Invalid Details.</p>
                <?php } ?>
                <?php } ?>


                     <div class="row">

                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <span class="account-input">
                                 <?php if($attachment_cnt>0) { ?>

                                     <?php while($attachment_fet=mysql_fetch_array($attachment_exe)) { ?>
                                        <a href="<?php echo $attachment_fet['eseal_attachment_path']; ?>" target="_blank">
                                            <?php echo $attachment_fet['eseal_attachment_name']; ?>
                                            <i class="fa fa-download"></i>
                                        </a>
                                         &nbsp;&nbsp;::&nbsp;&nbsp;
                                         <a href="delete-document.php?id=<?php echo $attachment_fet['id']; ?>&delete=1" onclick="return confirm('Are you sure you want to delete this item?');">
                                             <i class="fa fa-trash"></i>
                                         </a>

                                         <br/><br/><br/>
                                     <?php } ?>

                                 <?php } ?>
                                 </span>
                             </div>
                         </div><!-- Inner Column -->

                     </div><!-- Inner Row -->




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
