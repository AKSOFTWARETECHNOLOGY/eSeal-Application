<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$prodId = $_REQUEST['productId'];
$unicode = $_REQUEST['unicode'];
$sealcode = $_REQUEST['sealcode'];
$salePrice = $_REQUEST['productPrice'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$sql = "INSERT INTO `product_info` (user_id, product_id, product_unicode, product_sealcode, product_sale_price, created_by, updated_by, created_at, updated_at)
VALUES ('$user_id','$prodId','$unicode','$sealcode','$salePrice','$username','$username','$date','$date')";
$exe = mysql_query($sql);
header("Location: inventorieslist.php?suc=1");

?>