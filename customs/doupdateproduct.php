<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

if(isset($_REQUEST['product_id'])) {
    $prodId = $_REQUEST['product_id'];
    $prodName = $_REQUEST['productName'];
    $prodInfo = $_REQUEST['productInfo'];
    $prodPrice = $_REQUEST['productPrice'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `products` SET `product_name` = '$prodName', `product_info` = '$prodInfo', `product_price` = '$prodPrice',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `products`.`id` = '$prodId'";
    $exe = mysql_query($sql);
    header("Location: productlist.php?suc=1");
}
else{
    header("Location: productlist.php?err=1");
}

?>