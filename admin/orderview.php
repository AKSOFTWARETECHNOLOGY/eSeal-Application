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


if(isset($_REQUEST['order_id']))
{
    $order_id=$_REQUEST['order_id'];
}
else
{
    exit;
}

$product_sql="SELECT product_order_info.*, products.product_name, exporter_info.name_exporter,product_order.product_delivery_name,product_order.product_delivery_address,
 product_order.product_delivery_city,product_order.product_delivery_state,product_order.product_delivery_country,product_order.product_delivery_pincode,
 product_order.product_delivery_mobile,product_order.product_delivery_type,
  product_order.product_order_date,product_order.product_order_status,product_order.product_order_note
 FROM `product_order_info`
LEFT JOIN `product_order` ON product_order.id = product_order_info.product_order_id
LEFT JOIN `products` ON products.id = product_order.product_id
LEFT JOIN `exporter_info` ON exporter_info.id = product_order.product_exporter_id
WHERE `product_order_info`.product_order_id = $order_id";
$product_exe=mysql_query($product_sql);
$product_cnt=@mysql_num_rows($product_exe);
$product_fet=mysql_fetch_array($product_exe);

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

$city_value = $product_fet['product_delivery_city'];
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

$state_value = $product_fet['product_delivery_state'];
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

$country_value = $product_fet['product_delivery_country'];
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel </title>
    <?php include "head1.php"; ?>
    <style>
        .other-fields{border:1px dotted black; padding:10px;margin: 10px;}
        .req{
            color : red;
        }
    </style>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php include "header.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Product Order
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Product Order</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="other-fields">
                            <div class="row">
                                <div class="col-md-12"><h4 style="font-weight: bold; text-align: center;">Exporter</h4></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6"><label>Exporter Name</label></div>
                                    <div class="col-md-6"> <?php echo $product_fet['name_exporter']; ?></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6"><label>GST Number</label></div>
                                    <div class="col-md-6"> <?php echo $product_fet['gst_no']; ?></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6"><label>IEC Number</label></div>
                                    <div class="col-md-6"> <?php echo $product_fet['iec_no']; ?></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6"><label>Pan Number</label></div>
                                    <div class="col-md-6"> <?php echo $product_fet['pan_no']; ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="other-fields">
                            <table class="table">
                                <thead>
                                <th>Delivery Address</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <?php echo $product_fet['product_delivery_name']; ?><br>
                                        <?php echo $product_fet['product_delivery_address']; ?>,
                                        <?php echo $city_name; ?>, <?php echo $state_name; ?>, <?php echo $country_name; ?> - <?php echo $product_fet['product_delivery_pincode']; ?><br>
                                        <?php echo "Mobile : ".$product_fet['product_delivery_mobile']; ?><br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">View Product Order</h3>
                        </div><!-- /.box-header -->


                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <?php
                                if($product_cnt>0)
                                {
                                    ?>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Product SealCode</th>
                                            <th>Status</th>
                                            <th class="hidden"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while($prod_fet=mysql_fetch_array($product_exe))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $prod_fet['product_sealcode']; ?></td>
                                                <td>
                                                    <?php if($prod_fet['product_item_status'] == 0){
                                                        ?>
                                                        <button type="button" class="btn btn-warning btn-xs"> Unused </button>
                                                    <?php
                                                    }
                                                    else if($prod_fet['product_item_status'] == 1){
                                                        ?>
                                                        <button type="button" class="btn btn-warning btn-xs"> Used </button>
                                                    <?php
                                                    }?>
                                                </td>
                                                <td class="hidden">
                                                    <a href="orderinfoview.php?orderinfo_id=<?php echo $prod_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="orderinfoedit.php?orderinfo_id=<?php echo $prod_fet['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> Edit</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>
                                <?php
                                }
                                else{
                                    ?>
                                    <p><b> Records are being updated. </b></p>
                                <?php
                                }
                                ?>
                            </div>
                        </form>

                        <div class="other-fields">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="3">Order Summary</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Comment</th>
                                </tr>

                                <tr>
                                    <td><?php echo $product_fet['product_order_date']; ?></td>
                                    <td>
                                        <?php if($product_fet['product_order_status'] == 0){
                                            ?>
                                            <button type="button" class="btn btn-warning btn-xs"> Order Placed </button>
                                        <?php
                                        }
                                        else if($product_fet['product_order_status'] == 1){
                                            ?>
                                            <button type="button" class="btn btn-warning btn-xs"> Order Confirmed </button>
                                        <?php
                                        }
                                        else if($product_fet['product_order_status'] == 2){
                                            ?>
                                            <button type="button" class="btn btn-warning btn-xs"> Order Packed </button>
                                        <?php
                                        }
                                        else if($product_fet['product_order_status'] == 3){
                                        ?>
                                        <button type="button" class="btn btn-warning btn-xs"> Order Intransit </button>
                                        <?php
                                        }
                                            else if($product_fet['product_order_status'] == 4){
                                            ?>
                                            <button type="button" class="btn btn-warning btn-xs"> Order Delivered </button>
                                        <?php
                                        }?>
                                    </td>
                                    <td><?php echo $product_fet['product_order_note']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row other-fields">
                            <div class="row">
                                <div class="col-md-12"><h4 style="font-weight: bold;">Update Order Status</h4></div>
                            </div>
                            <div class="col-md-3">   </div>
                            <div class="col-md-6">
                                <form action="doupdateorderstatus.php?order_id=<?php echo $order_id; ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-3"><label>Order Status <span class="req">*</span></label></div>
                                        <div class="col-md-9">
                                            <select name="orderStatus" class="form-control" required>
                                                <option>Select Order Status</option>
                                                <option value="0" <?php if($product_fet['product_order_status'] == 0){echo 'selected'; } ?> >Order Placed</option>
                                                <option value="1" <?php if($product_fet['product_order_status'] == 1){echo 'selected'; } ?> >Order Confirmed</option>
                                                <option value="2" <?php if($product_fet['product_order_status'] == 2){echo 'selected'; } ?> >Order Packed</option>
                                                <option value="3" <?php if($product_fet['product_order_status'] == 3){echo 'selected'; } ?> >Order Intransit</option>
                                                <option value="4" <?php if($product_fet['product_order_status'] == 4){echo 'selected'; } ?> >Order Delivered</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><label>Comments</label></div>
                                        <div class="col-md-9">
                                            <textarea name="comments" class="form-control"><?php echo $product_fet['product_order_note']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6"><button type="submit" class="btn btn-info form-control">Save</button></div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
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
</body>
</html>
