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
    $exporter_id = $_REQUEST['exporter_id'];

    $sql = "UPDATE `users` SET `delete_status`='0' WHERE `id`='$exporter_id'";
    $delete = mysql_query($sql);

    header("Location: exporterlist.php?succ=1&msg=all");
}
else
{
    header("Location: exporterlist.php?err=1&msg=all");
}

?>

