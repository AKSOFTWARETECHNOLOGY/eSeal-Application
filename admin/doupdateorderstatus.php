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

if(isset($_REQUEST['order_id'])) {
    $order_id = $_REQUEST['order_id'];
    $orderStatus = $_REQUEST['orderStatus'];
    $comments = $_REQUEST['comments'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `product_order` SET `product_order_status` = '$orderStatus', `product_order_date` = '$date', `product_order_note` = '$comments',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `product_order`.`id` = '$order_id'";
    $exe = mysql_query($sql);
    header("Location: orderview.php?order_id=$order_id&suc=1");
}
else{
    header("Location: orderview.php?err=1");
}

?>