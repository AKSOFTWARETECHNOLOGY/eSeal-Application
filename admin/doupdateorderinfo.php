<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}


include "config.php";

if(isset($_REQUEST['orderinfo_id'])) {
    $orderinfo_id = $_REQUEST['orderinfo_id'];
    $unicode = $_REQUEST['unicode'];
    $sealcode = $_REQUEST['sealcode'];
    $zone = $_REQUEST['zone'];
    $commission = $_REQUEST['commission'];
    $shippingnum = $_REQUEST['shippingnum'];
    $shippingdate = $_REQUEST['shippingdate'];
    $sealingdate = $_REQUEST['sealingdate'];
    $sealingtime = $_REQUEST['sealingtime'];
    $destinationport = $_REQUEST['destinationport'];
    $containernum = $_REQUEST['containernum'];
    $trailer = $_REQUEST['trailer'];
    $drivername = $_REQUEST['drivername'];
    $driverlicence = $_REQUEST['driverlicence'];

    $productOrderId = $_REQUEST['productOrderId'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `product_order_info` SET `product_unicode` = '$unicode', `product_sealcode` = '$sealcode',`zone` = '$zone', `commissionerate` = '$commission',
`shipping_no` = '$shippingnum', `shipping_date` = '$shippingdate',`sealing_date` = '$sealingdate', `sealing_time` = '$sealingtime',
`destination_port` = '$destinationport', `container_no` = '$containernum',`trailer_truck_no` = '$trailer', `driver_name` = '$drivername',`driver_licence` = '$driverlicence',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `product_order_info`.`id` = '$orderinfo_id'";
    $exe = mysql_query($sql);
    header("Location: orderlist.php?suc=1");
}
else{
    header("Location: orderlist.php?err=1");
}

?>