<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}


include "config.php";

if(isset($_REQUEST['inventory_id'])) {
    $inventory_id = $_REQUEST['inventory_id'];
    $sealcode = $_REQUEST['sealcode'];
    $salePrice = $_REQUEST['salePrice'];
$product_sale_status = $_REQUEST['product_sale_status'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `product_info` SET `product_unicode` = '$sealcode', `product_sealcode` = '$sealcode', `product_sale_price` = '$salePrice', `product_sale_status` = '$product_sale_status', `updated_by` = '$username', `updated_at` = '$date'
            WHERE `product_info`.`id` = '$inventory_id'";
  
    $exe = mysql_query($sql);
    header("Location: inventoryedit.php?inventory_id=$inventory_id&suc=1");
}
else{
    header("Location: inventoryedit.php?inventory_id=$inventory_id&err=1");
}

?>