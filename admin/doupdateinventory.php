<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}


include "config.php";

if(isset($_REQUEST['inventory_id'])) {
    $inventory_id = $_REQUEST['inventory_id'];
    $unicode = $_REQUEST['unicode'];
    $sealcode = $_REQUEST['sealcode'];
    $salePrice = $_REQUEST['salePrice'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `product_info` SET `product_unicode` = '$unicode', `product_sealcode` = '$sealcode', `product_sale_price` = '$salePrice',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `product_info`.`id` = '$inventory_id'";
    $exe = mysql_query($sql);
    header("Location: inventorieslist.php?suc=1");
}
else{
    header("Location: inventorieslist.php?err=1");
}

?>