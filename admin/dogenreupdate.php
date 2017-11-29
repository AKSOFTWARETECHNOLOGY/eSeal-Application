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
$genre_id=$_REQUEST['genre_id'];
$update=$_REQUEST['update'];

$sql="UPDATE `genres` SET `genre_status` = '$update' WHERE `genres`.`id` = '$genre_id'";
$exe=mysql_query($sql);
header("Location: genrelist.php?suc=1");
}
else
{
header("Location: genrelist.php?err=1");
}
?>