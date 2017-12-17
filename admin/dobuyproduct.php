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

$prodId = $_REQUEST['productName'];
$exporterId = $_REQUEST['exporterName'];
$quantity = $_REQUEST['quantity'];
$payment = $_REQUEST['payment'];
$paymentnotes = $_REQUEST['PaymentNotes'];
$userId = $_REQUEST['userId'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$exp_sql="SELECT * FROM `exporter_info` as `ei` WHERE `ei`.id = '$exporterId'";
$exp_exe=mysql_query($exp_sql);
$exp_cnt=@mysql_num_rows($exp_exe);
$exp_fet=mysql_fetch_array($exp_exe);

$gst_num = $exp_fet['gstin'];
$pan_num = $exp_fet['pan_number'];
$iec_code = $exp_fet['iec_code'];

$inv_sql="SELECT * FROM `product_info` as `pi` WHERE `pi`.product_id = $prodId and `pi`.product_sale_status = 0";
$inv_exe=mysql_query($inv_sql);
$inv_cnt=@mysql_num_rows($inv_exe);
$inv_results = array();
while($row = mysql_fetch_assoc($inv_exe)) {
    array_push($inv_results, $row);
}

if($inv_cnt >= $quantity){
    for($i=0; $i<$quantity; $i++) {
        $id = $inv_results[$i]['id'];
        $sql = "UPDATE `product_info` as `pi` SET `product_exporter_id` = '$exporterId', `product_sale_status` = '1', `product_sale_date` = '$date',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `pi`.`id` = '$id'";
        $exe = mysql_query($sql);
    }

    $sale_price = $inv_results[0]['product_sale_price'];
    $sale_total = $quantity * $sale_price;

        $s = "INSERT INTO `product_order` (user_id, product_exporter_id, product_id, product_order_id, product_sale_quantity,
product_sale_price, product_sale_total, product_sale_type, product_sale_status, product_sale_date, product_sale_payment_type, product_sale_payment_notes)
values ('$userId', '$exporterId','$prodId','ESO100001', '$quantity','$sale_price','$sale_total','1','1','$date','$payment','$paymentnotes' )";
    $q= mysql_query($s);

    $last_order_id = mysql_insert_id();

    for($i=0; $i<$quantity; $i++) {
        $unicode =  $inv_results[$i]['product_unicode'];
        $sealcode = $inv_results[$i]['product_sealcode'];

        $s1 = "INSERT INTO `product_order_info` (user_id, product_id, product_order_id, product_unicode,
product_sealcode, product_exporter_id, iec_no, gst_no, pan_no, sealing_date)
values ('$userId','$prodId','$last_order_id', '$unicode','$sealcode','$exporterId','$iec_code','$gst_num','$pan_num','$date')";
        $q1 = mysql_query($s1);
    }

    header("Location: productlist.php?suc=1");
}
else{
    header("Location: productlist.php?err=1");
}


?>