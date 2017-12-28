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

$productName = $_REQUEST['productName'];
$quantity = $_REQUEST['quantity'];
$exporterId = $_REQUEST['exporterName'];

$ProductAmount = $_REQUEST['ProductAmount'];
$TotalAmount = $_REQUEST['TotalAmount'];
$GstAmount = $_REQUEST['GstAmount'];
$ShippingAmount = $_REQUEST['ShippingAmount'];
$DiscountAmount = $_REQUEST['DiscountAmount'];
$GrandAmount = $_REQUEST['GrandAmount'];

$DeliveryName = $_REQUEST['DeliveryName'];
$DeliveryAddress = $_REQUEST['DeliveryAddress'];
$DeliveryCity = $_REQUEST['DeliveryCity'];
$DeliveryState = $_REQUEST['DeliveryState'];
$DeliveryCountry = $_REQUEST['DeliveryCountry'];
$DeliveryPin = $_REQUEST['DeliveryPin'];
$DeliveryMobile = $_REQUEST['DeliveryMobile'];

$PaymentType = $_REQUEST['payment'];
$PaymentNotes = $_REQUEST['PaymentNotes'];

$SaleType = "1";
$SaleStatus = "0";
$SaleDate = date("Y-m-d");

$DeliveryType = "0";
$DeliveryStatus = "0";
$DeliveryDate = "0";

$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$ProductOrder="10000000".time();

$exp_sql="SELECT * FROM `exporter_info` as `ei` WHERE `ei`.id = '$exporterId'";
$exp_exe=mysql_query($exp_sql);
$exp_cnt=@mysql_num_rows($exp_exe);
$exp_fet=mysql_fetch_array($exp_exe);

$gst_num = $exp_fet['gstin'];
$pan_num = $exp_fet['pan_number'];
$iec_code = $exp_fet['iec_code'];

$inv_sql="SELECT * FROM `product_info` as `pi` WHERE `pi`.product_id = $productName and `pi`.product_sale_status = 0";
$inv_exe=mysql_query($inv_sql);
$inv_cnt=@mysql_num_rows($inv_exe);
$inv_results = array();
while($row = mysql_fetch_assoc($inv_exe)) {
    array_push($inv_results, $row);
}

if($inv_cnt >= $quantity){
   /* for($i=0; $i<$quantity; $i++) {
        $id = $inv_results[$i]['id'];
        $sql = "UPDATE `product_info` as `pi` SET `product_exporter_id` = '$exporterId', `product_sale_status` = '1', `product_sale_date` = '$date',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `pi`.`id` = '$id'";
        $exe = mysql_query($sql);
    }

    $sale_price = $inv_results[0]['product_sale_price'];
    $sale_total = $quantity * $sale_price;

        $s = "INSERT INTO `product_order` (user_id, product_exporter_id, product_id, product_order_id, product_sale_quantity,
product_sale_price, product_sale_total, product_sale_type, product_sale_status, product_sale_date, product_sale_payment_type, product_sale_payment_notes,created_by, updated_by, created_at, updated_at)
values ('$userId', '$exporterId','$prodId','ESO100001', '$quantity','$sale_price','$sale_total','1','1','$date','$payment','$paymentnotes','$username','$username','$date','$date')";
    $q= mysql_query($s);

    $last_order_id = mysql_insert_id();

    for($i=0; $i<$quantity; $i++) {
        $unicode =  $inv_results[$i]['product_unicode'];
        $sealcode = $inv_results[$i]['product_sealcode'];

        $s1 = "INSERT INTO `product_order_info` (user_id, product_id, product_order_id, product_unicode,
product_sealcode, product_exporter_id, iec_no, gst_no, pan_no, sealing_date)
values ('$userId','$prodId','$last_order_id', '$unicode','$sealcode','$exporterId','$iec_code','$gst_num','$pan_num','$date')";
        $q1 = mysql_query($s1);
    }*/


    $insert_order_sq1 = "INSERT INTO `product_order` (user_id, product_exporter_id, product_id, product_order_id,
    product_sale_quantity, product_sale_price, product_sale_total, product_sale_gst, product_sale_delivery, product_sale_discount, product_sale_grand_total,
    product_sale_type, product_sale_status, product_sale_date, product_sale_payment_type, product_sale_payment_notes,
    product_delivery_name, product_delivery_address, product_delivery_city,  product_delivery_state, product_delivery_country, product_delivery_pincode, product_delivery_mobile,
    product_delivery_type, product_delivery_status, product_delivery_date,
    created_by, updated_by, created_at, updated_at)
    VALUES ('$user_id','$exporterId','$productName','$ProductOrder',
    '$quantity','$ProductAmount','$TotalAmount','$GstAmount','$ShippingAmount','$DiscountAmount','$GrandAmount',
    '$SaleType','$SaleStatus','$SaleDate','$PaymentType','$PaymentNotes',
    '$DeliveryName','$DeliveryAddress','$DeliveryCity','$DeliveryState','$DeliveryCountry','$DeliveryPin','$DeliveryMobile',
    '$DeliveryType', '$DeliveryStatus', '$DeliveryDate',
    '$username','$username','$date','$date')";
    $insert_order_exe = mysql_query($insert_order_sq1);

    $order_id=mysql_insert_id();

    if($order_id>0) {
        $product_info_sql = "SELECT * FROM `product_info` WHERE `product_id`='$productName' AND `product_sale_status`=0 ORDER BY `id` ASC LIMIT $Quantity ";
        echo $product_info_sql;
        $product_info_exe = mysql_query($product_info_sql);
        while ($product_info_fet = mysql_fetch_array($product_info_exe)) {
            $product_id = $product_info_fet['product_id'];
            $product_info_id = $product_info_fet['id'];
            $product_unicode = $product_info_fet['product_unicode'];
            $product_sealcode = $product_info_fet['product_sealcode'];
            $product_sale_price = $product_info_fet['product_sale_price'];
            $product_exporter_id = $exporterId;
            $product_sale_status = 1;
            $product_sale_date = date("Y-m-d");


            $product_info_update_sql = "UPDATE `product_info` SET `product_exporter_id`='$product_exporter_id',`product_sale_status`='$product_sale_status',`product_sale_date`='$product_sale_date' WHERE `id`='$product_info_id' AND `product_id`='$product_id' AND `product_sale_status`=0";
            //echo $product_info_update_sql;
            $product_info_update_exe = mysql_query($product_info_update_sql);

            /*
             INSERT SQL
            */
            $product_order_info_sql = "INSERT INTO `product_order_info`
            (`user_id`, `product_id`, `product_order_id`, `product_unicode`, `product_sealcode`, `product_exporter_id`,
            `created_by`, `updated_by`, `created_at`, `updated_at`)
            VALUES
            ('$exporterId', '$product_id', '$order_id', '$product_unicode', '$product_sealcode','$product_exporter_id',
            '$username', '$username', '$product_sale_date', '$product_sale_date')";
            //echo $product_order_info_sql;
            $product_order_info_exe = mysql_query($product_order_info_sql);
        }
        header("Location: productlist.php?suc=1");
    }

    else{
        header("Location: productlist.php?err=2");
    }
}
else{
    header("Location: productlist.php?err=1");
}


?>