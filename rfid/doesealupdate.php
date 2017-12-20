<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
	header("Location: index.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/

 
include "config.php";

if(isset($_REQUEST['eseal_accept']))
{
$product_sealcode=$_REQUEST['product_sealcode'];
$customs_approve_status=$_REQUEST['customs_approve_status'];
$customs_approve_date=date("Y-m-d");
$customs_approve_time=date("h:i:s");


$sql="UPDATE `product_order_info` SET `customs_approve_status` = '$customs_approve_status',`customs_approve_date` = '$customs_approve_date',`customs_approve_time` = '$customs_approve_time' WHERE `product_sealcode` = '$product_sealcode'";
$exe=mysql_query($sql);
header("Location: esealview.php?eseal_id=$product_sealcode&suc=1");
}
else if(isset($_REQUEST['eseal_decline']))
{
    $product_sealcode=$_REQUEST['product_sealcode'];
    $customs_approve_status=$_REQUEST['customs_approve_status'];
    $customs_approve_date=date("Y-m-d");
    $customs_approve_time=date("h:i:s");


    $sql="UPDATE `product_order_info` SET `customs_approve_status` = '$customs_approve_status',`customs_approve_date` = '$customs_approve_date',`customs_approve_time` = '$customs_approve_time' WHERE `product_sealcode` = '$product_sealcode'";
    $exe=mysql_query($sql);
    header("Location: esealview.php?eseal_id=$product_sealcode&suc=1");
}
else
{
header("Location: esealview.php?eseal_id=$product_sealcode&&err=1");
}
?>