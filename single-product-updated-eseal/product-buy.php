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

$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];

$product_id = 1;
$product_sql="SELECT * FROM `products` WHERE `id`='$product_id'";
$product_exe=mysql_query($product_sql);
$product_fetch=mysql_fetch_array($product_exe);

$product_count_fetch=0;
$product_id = 1;
$product_count_sql="SELECT COUNT(*) AS `pro_count` FROM `product_info` WHERE `product_id`='$product_id' AND `product_sale_status`=0";
$product_count_exe=mysql_query($product_count_sql);
$product_count_fet=mysql_fetch_array($product_count_exe);
$product_count_fetch=$product_count_fet['pro_count'];

$useraddress_sql="SELECT * FROM `exporter_address` WHERE `user_id`='$user_id' AND `status`='1'";
$useraddress_exe=mysql_query($useraddress_sql);


$setting_sql="SELECT * FROM `product_setting` WHERE `id`=1";
$setting_exe=mysql_query($setting_sql);
$setting_fet=mysql_fetch_array($setting_exe);
$product_gst=$setting_fet['product_gst'];
$product_discount=$setting_fet['product_discount'];
$product_shipping=$setting_fet['product_shipping'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E Seal</title>
<link href="images/favicon.png" type="image/png" rel="shortcut icon">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
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
			  
            });
</script>
</head>

<body>

<?php include "top_header.php"; ?>

<?php include "header.php"; ?>

<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>E Seal</h3>
</div>
</div>
<style>
    .products-category {
        background: #ffffff !important;
        padding: 0 !important;
    }
</style>

<div class="products-category">
<div class="container-fluid">
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <?php include "sidebar.php"; ?>
    </div><!--Column 6-->

    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="my-account">
            <h3 class="hidden"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Seal Product </h3>

            <div class="common-item">
                <div class="text hidden">
                    <h3><a href="javascript:void(0);">RFID Electronic Seal -  ₹ 299.00 </a></h3>
                </div>
                <div class="item">
                    <a href="javascript:void(0);"><img src="images/seal.jpg" alt="" title="" class="img-responsive"></a>
                </div><!-- Item -->
            </div>

            <form name="buyform" id="buyform" action="dobuy.php" method="post">
                <div class="row" style="padding-top:10px; ">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <select class="register-input" name="Product" id="Product" required >
                                <option value="<?php echo $product_fetch['id']; ?>"><?php echo $product_fetch['product_name']; ?> -  ₹ <?php echo $product_fetch['product_price']; ?></option>
                            </select>
                        </div>
                    </div><!-- Inner Column -->

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <select class="register-input" name="Quantity" id="Quantity" required onchange="productquantity(this.value);" >
                                <option value="">Quantity</option>
                                <?php if($product_count_fetch>=10) { ?>
                                    <option value="10">10</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=20) { ?>
                                    <option value="20">20</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=30) { ?>
                                    <option value="30">30</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=40) { ?>
                                    <option value="40">40</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=50) { ?>
                                    <option value="50">50</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=60) { ?>
                                    <option value="60">60</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=70) { ?>
                                    <option value="70">70</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=80) { ?>
                                    <option value="80">80</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=90) { ?>
                                    <option value="90">90</option>
                                <?php } ?>
                                <?php if($product_count_fetch>=100) { ?>
                                    <option value="100">100</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div><!-- Inner Column -->

                </div>
                <div class="row" style="padding-top:10px; ">

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <label> Product Total </label>
                        <div id="total" style="font-weight: bold;">
                            Rs. 0:00
                        </div>
                    </div><!-- Inner Column -->
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <label> GST (<?php echo $product_gst; ?> %) </label>
                        <div id="gsttotal" style="font-weight: bold;">
                            Rs. 0:00
                        </div>
                    </div><!-- Inner Column -->
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <label> Shipping (<?php echo $product_shipping; ?>/Unit)</label>
                        <div id="shippingtotal" style="font-weight: bold;">
                            Rs. 0:00
                        </div>
                    </div><!-- Inner Column -->
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <label> Discount (<?php echo $product_discount; ?> %) </label>
                        <div id="discounttotal" style="font-weight: bold;">
                            Rs. 0:00
                        </div>
                    </div><!-- Inner Column -->

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <label> Product Grand Total </label>
                        <div id="grandtotal" style="font-weight: bold;">
                            Rs. 0:00
                        </div>
                    </div><!-- Inner Column -->
                </div>


                <div class="row" style="padding-top:10px; ">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">


                            <select class="register-input" name="Delivery" id="Delivery" required onchange="javascript:deliveryaddress(this.value);">
                                <option value="0">Add New Delivery Address / Choose Delivery Address</option>
                                <?php if(mysql_num_rows($useraddress_exe)>0) { ?>
                                    <?php while($useraddress_fet=mysql_fetch_array($useraddress_exe)) { ?>
                                        <option value="<?php echo $useraddress_fet['id']; ?>"><?php echo $useraddress_fet['name'].' - '.$useraddress_fet['mobile']; ?></option>
                                    <?php } ?>
                                <?php } ?>

                            </select>
                        </div>
                    </div><!-- Inner Column -->
                </div>


                <div class="other-fields">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Name Of Company / Person *</label>
                                <input type="text" name="DeliveryName" id="DeliveryName" class="register-input" value="" placeholder="Name Of Person" required />
                            </div>
                        </div><!-- Inner Column -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mobile *</label>
                                <input type="text" name="DeliveryMobile" id="DeliveryMobile" class="register-input" value="" maxlength="10" placeholder="Person Mobile" required />
                            </div>
                        </div><!-- Inner Column -->
                    </div><!-- Inner Row -->


                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Address *</label>
                                <textarea name="DeliveryAddress" id="DeliveryAddress" placeholder="Delivery Address" class="register-input" required></textarea>
                            </div>
                        </div><!-- Inner Column -->

                    </div><!-- Inner Row -->


                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Country *</label>
                                <select class="register-input" name="DeliveryCountry" id="DeliveryCountry" required >
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
                                <label>State *</label>
                                <select class="register-input" name="DeliveryState" id="DeliveryState" required>
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
                                <label>City *</label>
                                <select class="register-input" name="DeliveryCity" id="DeliveryCity" required>
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
                                <label>Pincode *</label>
                                <input type="text" name="DeliveryPin" id="DeliveryPin" class="register-input" maxlength="6" value="" required />
                            </div>
                        </div><!-- Inner Column -->

                    </div><!-- Inner Row -->




                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Payment Type *</label>
                            <!--
                            <option value="1"> Online - CCAvenue </option>
                             -->
                            <select class="register-input" name="PaymentType" id="PaymentType" required>
                                <option value=""> Select Payment Option </option>

                                <option value="2"> Credit - 15 Days </option>
                                <option value="3"> Credit - 30 Days </option>
                                <option value="4"> Cash On Delivery </option>
                                <option value="5"> NEFT </option>
                                <option value="6"> Cheque/DD </option>
                            </select>

                        </div>
                    </div><!-- Inner Column -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Payment Notes *</label>
                            <textarea name="PaymentNotes" id="PaymentNotes" placeholder="Payment Notes" class="register-input" required></textarea>

                        </div>
                    </div><!-- Inner Column -->
                </div><!-- Inner Row -->

                <div class="buy-now">
                    <div class="form-group last-otp">
                        <input type="hidden" name="ProductAmount" id="ProductAmount" value="<?php echo $product_fetch['product_price']; ?>" />

                        <input type="hidden" name="TotalAmount" id="TotalAmount" value="0" />
                        <input type="hidden" name="GstAmount" id="GstAmount" value="0" />
                        <input type="hidden" name="ShippingAmount" id="ShippingAmount" value="0" />
                        <input type="hidden" name="DiscountAmount" id="DiscountAmount" value="0" />
                        <input type="hidden" name="GrandAmount" id="GrandAmount" value="0" />

                        <input type="submit" name="buyproduct" id="submitbutton" value="Buy Now" />
                    </div>
                </div>

            </form>

        </div>
    </div>


</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

<script>


    $("#submitbuttonX").click(function(event){
        if(!confirm ("your message"))
            event.preventDefault();
    });

    function productquantity(countValue)
    {

        var ProductValue = $("#ProductAmount").val();
        var TotalValue = countValue * ProductValue;

        $("#total").text("Rs. "+TotalValue.toFixed(2));
        $("#TotalAmount").val(TotalValue.toFixed(2));

        var GstValue = 18;
        var GstTotalValue = GstValue * (TotalValue/100);

        $("#gsttotal").text("Rs. "+GstTotalValue.toFixed(2));
        $("#GstAmount").val(GstTotalValue.toFixed(2));

        var ShippingValue = 50;
        var ShippingTotalValue = countValue * ShippingValue;

        $("#shippingtotal").text("Rs. "+ShippingTotalValue.toFixed(2));
        $("#ShippingAmount").val(ShippingTotalValue.toFixed(2));

        var DiscountValue = 5;
        var DiscountTotalValue = DiscountValue * (TotalValue/100);

        $("#discounttotal").text("Rs. "+DiscountTotalValue.toFixed(2));
        $("#DiscountAmount").val(DiscountTotalValue.toFixed(2));


        var GrandTotalValue = ( parseFloat(TotalValue.toFixed(2)) + parseFloat(GstTotalValue.toFixed(2)) + parseFloat(ShippingTotalValue.toFixed(2)) ) - parseFloat(DiscountTotalValue.toFixed(2));

        $("#grandtotal").text("Rs. "+GrandTotalValue.toFixed(2));
        $("#GrandAmount").val(GrandTotalValue.toFixed(2));

    }


    function deliveryaddress(id)
    {

        if(id==0)
        {
            $("#DeliveryName").val('');
            $("#DeliveryMobile").val('');
            $("#DeliveryAddress").val('');
            $("#DeliveryCountry").val('');
            $("#DeliveryState").val('');
            $("#DeliveryCity").val('');
            $("#DeliveryPin").val('');
        }
        else
        {

            var BASEURL = "http://www.ssgaeseal.com/";
            //var BASEURL = "http://localhost/eSeal-Application/single-product-updated-eseal/";
            var BASEURL = "";
            var status = 1;
            var callurl = BASEURL + 'ajax-get-address.php?id='+id;

            $.ajax({
                url: callurl,
                type: "get",
                data: {"id": id, "status": status},
                success: function (data) {
                    var obj = JSON.parse(data);

                    $("input#DeliveryName").val(obj.name);
                    $("input#DeliveryMobile").val(obj.mobile);
                    $("textarea#DeliveryAddress").val(obj.address);
                    $("select#DeliveryCountry").val(obj.country);
                    $("select#DeliveryState").val(obj.state);
                    $("select#DeliveryCity").val(obj.city);
                    $("input#DeliveryPin").val(obj.pincode);

                }
            });

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
        $("form#buyform").validate({
            // Specify validation rules
            rules: {
                DeliveryName: {
                    required: true,
                    lettersonly: true
                },
                DeliveryMobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 11
                },
                DeliveryPin: {
                    required: true,
                    number: true,
                    minlength: 6,
                    maxlength: 6
                },
                DeliveryCity: "required",
                DeliveryState: "required",
                DeliveryCountry: "required",
                DeliveryAddress: "required",
                Product: "required",
                Quantity: "required",
            },
            // Specify validation error messages
            messages: {
                DeliveryName: {
                    required: "Please enter your name",
                    lettersonly: "Your name must be characters"
                },
                DeliveryMobile: {
                    required: "Please provide a valid mobile number",
                    minlength: "Your mobile number must be 10 characters long",
                    maxlength: "Your mobile number must be 11 characters long"
                },
                DeliveryPin: {
                    required: "Please provide a valid Pincode",
                    minlength: "Your Pincode must be 6 characters long",
                    maxlength: "Your Pincode must be 6 characters long"
                },
                DeliveryCity: "Please choose your City",
                DeliveryState: "Please choose your State",
                DeliveryCountry: "Please choose your Country",
                DeliveryAddress: "Please enter your Address",
                Product: "Please choose Product",
                Quantity: "Please choose Quantity",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {

                if(confirm ("your message"))
                {
                    form.submit();
                }
                else
                {
                    event.preventDefault();
                }

            }
        });
    });
</script>
<style>
    label.error { color: red; }
</style>
</body>
</html>
