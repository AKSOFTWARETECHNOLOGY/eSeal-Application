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
    $customs_id = $_REQUEST['customs_id'];
    $date=date("Y-m-d");

    $sql = "UPDATE `users` SET `delete_status`='0', `updated_at` = '$date'  WHERE `id`='$customs_id'";
    $delete = mysql_query($sql);

    header("Location: customslist.php?succ=1&msg=all");
}
else if(isset($_REQUEST['enable']))
{
    $customs_id = $_REQUEST['customs_id'];
    $date=date("Y-m-d");

    $sql = "UPDATE `users` SET `delete_status`='1', `updated_at` = '$date'  WHERE `id`='$customs_id'";
    $delete = mysql_query($sql);

    header("Location: customslist.php?succ=1&msg=all");
}
else
{
    header("Location: customslist.php?err=1&msg=all");
}

?>

