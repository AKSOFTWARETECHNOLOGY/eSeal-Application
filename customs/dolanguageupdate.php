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
$language_id=$_REQUEST['language_id'];
$update=$_REQUEST['update'];

$sql="UPDATE `languages` SET `language_status` = '$update' WHERE `languages`.`id` = '$language_id'";
$exe=mysql_query($sql);
header("Location: languagelist.php?suc=1");
}
else
{
header("Location: languagelist.php?err=1");
}
?>