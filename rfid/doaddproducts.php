<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$prodName = $_REQUEST['productName'];
$prodInfo = $_REQUEST['productInfo'];
$prodPrice = $_REQUEST['productPrice'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$sql = "INSERT INTO `products` (user_id, product_name, product_info, product_price, product_status, created_by, updated_by, created_at, updated_at) VALUES ('$user_id','$prodName','$prodInfo','$prodPrice','1','$username','$username','$date','$date')";
$exe = mysql_query($sql);
header("Location: productlist.php?suc=1");

?>