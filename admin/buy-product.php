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

$product_sql="SELECT * FROM `products` WHERE `products`.product_status = 1 and `products`.user_id = $user_id";
$product_exe=mysql_query($product_sql);
$product_cnt=@mysql_num_rows($product_exe);
$product_fet=mysql_fetch_array($product_exe);
$prodId = $product_fet['id'];

$inv_sql="SELECT * FROM `product_info` as `pi` WHERE `pi`.product_id = $prodId and `pi`.product_sale_status = 0";
$inv_exe=mysql_query($inv_sql);
$inv_cnt=@mysql_num_rows($inv_exe);
//$product_fet=mysql_fetch_array($product_exe);

$product_count_fetch=0;
$product_id = 1;
$product_count_sql="SELECT COUNT(*) AS `pro_count` FROM `product_info` WHERE `product_id`='$product_id' AND `product_sale_status`=0 AND `product_exporter_id` IS NULL";
$product_count_exe=mysql_query($product_count_sql);
$product_count_fet=mysql_fetch_array($product_count_exe);
$product_count_fetch=$product_count_fet['pro_count'];

$export_sql="SELECT ei.* FROM `exporter_info` AS `ei`
LEFT JOIN `users` ON users.id = ei.user_id
WHERE `users`.delete_status = 1";
$export_exe=mysql_query($export_sql);
$export_cnt=@mysql_num_rows($export_exe);

$setting_sql="SELECT * FROM `product_setting` WHERE `id`=1";
$setting_exe=mysql_query($setting_sql);
$setting_fet=mysql_fetch_array($setting_exe);
$product_gst=$setting_fet['product_gst'];
$product_discount=$setting_fet['product_discount'];
$product_shipping=$setting_fet['product_shipping'];

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
<!DOCTYPE html>
<html>
<head>
    <style>
        .req{
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
                Buy Product
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Buy Product</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Buy Product Details</h3>
                        </div><!-- /.box-header -->

                        <div class="col-md-12">
                            <a href="productlist.php"><button type="submit" class="btn btn-warning col-md-2"  style="margin-bottom:10px;float:right;">Back to Product List</button></a>
                        </div>

                        <!-- form start -->
                        <form role="form" action="dobuyproduct.php" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select name="productName" id="productName" class="form-control">
                                                <option value="0"> Select Product </option>
                                                <option value="<?php echo $product_fet['id']; ?>" selected> <?php echo $product_fet['product_name'] . '- ₹' . $product_fet['product_price']; ?> </option>
                                            </select>
                                            <div class="err" id="errProductName" style="color:red"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Quantity<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="quantity" id="quantity" required onchange="productquantity(this.value);" >
                                                <option value="0"> Select Quantity </option>
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
                                            <div class="err" id="errQuantity" style="color:red"></div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; margin-bottom:10px; border: 1px grey solid">
                                        <div class="form-group col-md-12">
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
                                    </div>

                                    <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Exporter Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="exporterName" id="exporterName" required>
                                                <option value="0"> Select Exporter </option>
                                                <?php
                                                while($export_fet=mysql_fetch_array($export_exe))
                                                {
                                                ?>
                                                <option value="<?php echo $export_fet['user_id']; ?>"> <?php echo $export_fet['iec_code']; ?> - <?php echo $export_fet['name_exporter']; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <div class="err" id="errExporterName" style="color:red"></div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="expAddress row" style="padding-top:10px; border: 1px black solid; display: none;">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <select class="form-control" name="Delivery" id="Delivery" required onchange="javascript:deliveryaddress(this.value);">
                                                </select>
                                            </div>
                                        </div><!-- Inner Column -->

                                        <div class="other-fields">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Name Of Company / Person <span class="req"> *</span></label>
                                                        <input type="text" name="DeliveryName" id="DeliveryName" class="form-control" value="" placeholder="Name Of Person" required />
                                                    </div>
                                                </div><!-- Inner Column -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Mobile <span class="req"> *</span></label>
                                                        <input type="text" name="DeliveryMobile" id="DeliveryMobile" class="form-control" value="" maxlength="10" placeholder="Person Mobile" required />
                                                    </div>
                                                </div><!-- Inner Column -->
                                            </div><!-- Inner Row -->

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Address <span class="req"> *</span></label>
                                                        <textarea name="DeliveryAddress" id="DeliveryAddress" placeholder="Delivery Address" class="form-control" required></textarea>
                                                    </div>
                                                </div><!-- Inner Column -->
                                            </div><!-- Inner Row -->

                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Country <span class="req"> *</span></label>
                                                        <select class="form-control" name="DeliveryCountry" id="DeliveryCountry" required >
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
                                                        <label>State <span class="req"> *</span></label>
                                                        <select class="form-control" name="DeliveryState" id="DeliveryState" required>
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
                                                        <label>City <span class="req"> *</span></label>
                                                        <select class="form-control" name="DeliveryCity" id="DeliveryCity" required>
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
                                                        <label>Pincode <span class="req"> *</span></label>
                                                        <input type="text" name="DeliveryPin" id="DeliveryPin" class="form-control" maxlength="6" value="" required />
                                                    </div>
                                                </div><!-- Inner Column -->
                                            </div><!-- Inner Row -->
                                        </div>
                                    </div>


                                    <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Payment Option<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="payment" id="payment">
                                                <option value=""> Select Payment Option </option>
                                                <option value="2"> Credit - 15 Days </option>
                                                <option value="3"> Credit - 30 Days </option>
                                                <option value="4"> Cash On Delivery </option>
                                                <option value="5"> NEFT </option>
                                                <option value="6"> Cheque/DD </option>
                                            </select>
                                            <div class="err" id="errPayment" style="color:red"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Payment Notes</label>
                                        <div class="col-sm-9">
                                            <textarea name="PaymentNotes" id="PaymentNotes" placeholder="Payment Notes" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="ProductAmount" id="ProductAmount" value="<?php echo $product_fet['product_price']; ?>" />

                                        <input type="hidden" name="TotalAmount" id="TotalAmount" value="0" />
                                        <input type="hidden" name="GstAmount" id="GstAmount" value="0" />
                                        <input type="hidden" name="ShippingAmount" id="ShippingAmount" value="0" />
                                        <input type="hidden" name="DiscountAmount" id="DiscountAmount" value="0" />
                                        <input type="hidden" name="GrandAmount" id="GrandAmount" value="0" />

                                        <button type="submit" class="btn btn-primary btn-block btn-flat buy-prod">BUY</button>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

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

<script type="text/javascript">
    $(document).ready(function(){
        $("#exporterName").change(function(){
            var BASEURL = "http://www.ssgaeseal.com/";
            var BASEURL = "http://localhost/eSeal-Application/admin/";
            var BASEURL = "";
            var expo = $(this).val();
            var status = 1;
            var callurl = BASEURL + 'ajax-get-expo-address.php?id='+expo;
            $.ajax({
                url: callurl,
                type: "get",
                data: {"id": expo, "status": status},
                success: function (data) {
                    $('#Delivery').html(data);
                    $('.expAddress').show();
                }
            });


        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".buy-prod").click(function(){
            $("div.err").html( "  " );
            var prodId = $('#productName').val();
            if(prodId == 0){
                $("div#errProductName").html( "This field is required" );
                return false;
            }
            var expId = $('#exporterName').val();
            if(expId == 0){
                $("div#errExporterName").html( "This field is required" );
                return false;
            }
            var quantity = $('#quantity').val();
            if(quantity == 0){
                $("div#errQuantity").html( "This field is required" );
                return false;
            }
            var pay = $('#payment').val();
            if(pay == 0){
                $("div#errPayment").html( "This field is required" );
                return false;
            }

        });
    });
</script>

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
</body>
</html>
