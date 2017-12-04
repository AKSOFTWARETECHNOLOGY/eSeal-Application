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

if(isset($_REQUEST['delete']))
{
    $inventoryId=$_REQUEST['inventory_id'];
    $user_date=date("Y-m-d");

    $sql = "DELETE FROM `product_info` WHERE `id` = '$inventoryId'";
    $delete = mysql_query($sql);

    header("Location: inventorieslist.php?succ=1&msg=all");
}
else
{
    header("Location: inventorieslist.php?err=1&msg=all");
}

?>

