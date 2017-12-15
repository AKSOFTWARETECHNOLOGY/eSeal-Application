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

if(isset($_REQUEST['addseal']))
{
//print_r($_REQUEST);exit;


$id = $_REQUEST['id'];

$iec_no = $_REQUEST['iec_no'];
$pan_no = $_REQUEST['pan_no'];
$gst_no = $_REQUEST['gst_no'];

$sealing_date = $_REQUEST['sealing_date'];
$sealing_time = $_REQUEST['sealing_time'];

$shipping_no = $_REQUEST['shipping_no'];
$shipping_date = $_REQUEST['shipping_date'];

$trailer_truck_no = $_REQUEST['trailer_truck_no'];
$driver_number = $_REQUEST['driver_number'];
$driver_licence = $_REQUEST['driver_licence'];
$driver_name = $_REQUEST['driver_name'];

$container_size = $_REQUEST['container_size'];
$container_no = $_REQUEST['container_no'];

$destination_port = $_REQUEST['destination_port'];
$terminal_name = $_REQUEST['terminal_name'];

$form_no = $_REQUEST['form_no'];
$eway_no = $_REQUEST['eway_no'];
$seal_type = $_REQUEST['seal_type'];
$cfs_reach_time = $_REQUEST['cfs_reach_time'];
$notes = $_REQUEST['notes'];

$SaleType = "Online";
$SaleStatus = "0";
$SaleDate = date("Y-m-d");

$DeliveryType = "0";
$DeliveryStatus = "0";
$DeliveryDate = "0";

$username = "User";
$date = date("Y-m-d");

$ProductOrder="10000000".time();

$product_order_info_count_fetch=0;
$product_order_info_count_sql="SELECT COUNT(*) AS `pro_count` FROM `product_order_info` WHERE `id`='$id' AND `product_exporter_id`='$user_id' AND `seal_type` IS NULL";
$product_order_info_count_exe=mysql_query($product_order_info_count_sql);
$product_order_info_count_fet=mysql_fetch_array($product_order_info_count_exe);
$product_order_info_count_fetch=$product_order_info_count_fet['pro_count'];

//echo $product_order_info_count_fetch;
//echo $product_order_info_count_sql;
//exit;

    if($product_order_info_count_fetch>0)
    {

            $product_order_info_update_sql="UPDATE `product_order_info` SET
                                        `iec_no`='$iec_no',`pan_no`='$pan_no',`gst_no`='$gst_no',
                                        `sealing_date`='$sealing_date',`sealing_time`='$sealing_time',
                                        `shipping_no`='$shipping_no',`shipping_date`='$shipping_date',
                                        `trailer_truck_no`='$trailer_truck_no',`driver_number`='$driver_number',
                                        `driver_licence`='$driver_licence',`driver_name`='$driver_name',
                                        `container_size`='$container_size',`container_no`='$container_no',
                                        `destination_port`='$destination_port',`terminal_name`='$terminal_name',
                                        `form_no`='$form_no',`eway_no`='$eway_no',
                                        `seal_type`='$seal_type',`cfs_reach_time`='$cfs_reach_time',
                                        `notes`='$notes'
                                        WHERE `id`='$id' AND `product_exporter_id`='$user_id' AND `seal_type` IS NULL";
            //echo $product_order_info_update_sql;
            $product_order_info_update_exe=mysql_query($product_order_info_update_sql);

        header("Location: my-seal.php?success=1&msg=all");
    }
    else
    {
        header("Location: my-seal.php?error=2&msg=all");
    }
				

}
else
{
header("Location: my-seal.php?error=1&msg=all");
} 	
	
?>
                            
						