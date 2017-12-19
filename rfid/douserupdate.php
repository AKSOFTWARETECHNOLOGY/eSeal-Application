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

if(isset($_REQUEST['update']))
{
$user_id=$_REQUEST['user_id'];
$update=$_REQUEST['update'];

$sql="UPDATE `users` SET `delete_status` = '$update' WHERE `users`.`id` = '$user_id'";
$exe=mysql_query($sql);
header("Location: writerlist.php?suc=1");
}
else
{
header("Location: writerlist.php?err=1");
}
?>