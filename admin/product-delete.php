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

if(isset($_REQUEST['disable']))
{
    $prodId=$_REQUEST['product_id'];
    $date=date("Y-m-d");

    $sql = "UPDATE `products` SET `product_status` = '0', `updated_by` = '$user_name', `updated_at` = '$date'
            WHERE `products`.`id` = '$prodId'";
    $delete = mysql_query($sql);

    header("Location: productlist.php?succ=1");
}
else if(isset($_REQUEST['enable']))
{
    $prodId=$_REQUEST['product_id'];
    $date=date("Y-m-d");

    $sql = "UPDATE `products` SET `product_status` = '1', `updated_by` = '$user_name', `updated_at` = '$date'
            WHERE `products`.`id` = '$prodId'";
    $delete = mysql_query($sql);

    header("Location: productlist.php?succ=1");
}else
{
    header("Location: productlist.php?err=1");
}

?>
                            
						