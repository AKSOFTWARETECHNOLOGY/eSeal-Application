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


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Team Member</title>
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
<h3>Team Member Entries</h3>
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
            <li><a class="" href="my-team.php">Back</a></li>
        </ul>
    </div><!--Form Btn-->
<div class="my-account">
<h3><i class="fa fa-address-book" aria-hidden="true"></i> Team Member Entries</h3>
<div class="address-bar">
<div class="row">


    <form name="addressform" id="addressform" action="doteam.php" method="post">
        <div class="col-md-12 col-sm-12 col-xs-12 address">
            <div class="account-register">
                <?php if(isset($_REQUEST['insert'])) { ?>
                <?php if(isset($_REQUEST['success'])) { ?>
                    <p style="color:green;font-weight:bold"> Your Team Member Added Successfully!</p>
                <?php } ?>

                <?php if(isset($_REQUEST['error'])) { ?>
                    <p style="color:red;font-weight:bold"> Invalid Details.</p>
                <?php } ?>
                <?php } ?>

                 <div class="other-fields">
                    <div class="row">


                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Email Id*</label>
                                <input type="text" name="email" id="email" class="register-input" value="" required />
                                <span id="emailstatus"></span>
                                <span>(This will become your default registered email)</span>
                            </div>
                        </div><!-- Inner Column -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" name="password" id="password" class="register-input" value="" required />
                                <span>( The password should be atleast 5 charaters long )</span>
                            </div>
                        </div><!-- Inner Column -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Name Of Member *</label>
                                <input type="text" name="personName" id="personName" class="register-input" value="" placeholder="Name Of Member" required />
                            </div>
                        </div><!-- Inner Column -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mobile No.*</label>
                                <input type="text" name="mobile" id="mobile" class="register-input" value="" maxlength="10" required />
                            </div>
                        </div><!-- Inner Column -->
                    </div><!-- Inner Row -->


                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Address *</label>
                                <textarea name="address" id="address" placeholder="Address" class="register-input" required></textarea>
                            </div>
                        </div><!-- Inner Column -->

                    </div><!-- Inner Row -->


                    <div class="row">


                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>City *</label>
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


                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>State *</label>


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


                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Country *</label>
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
                                <label>Pincode *</label>
                                <input type="text" name="pincode" id="pincode" class="register-input" value="" maxlength="6" required />
                            </div>
                        </div><!-- Inner Column -->






                    </div><!-- Inner Row -->




                </div>






                <div class="row">

                  <div class="form-group last-otp">
                    <input type="submit" name="addteam" value="Submit">
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
        $("form#addressform").validate({
            // Specify validation rules
            rules: {
                personName: {
                    required: true,
                    lettersonly: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
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
                address: "required",
            },
            // Specify validation error messages
            messages: {
                personName: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                mobile: {
                    required: "Please provide a valid mobile number",
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 10 characters long"
                },
                pincode: {
                    required: "Please provide a valid pincode",
                    minlength: "Your pincode must be 6 characters long",
                    maxlength: "Your pincode must be 6 characters long"
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
</style>

</body>
</html>
