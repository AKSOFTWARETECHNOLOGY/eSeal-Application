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
$book_id=$_REQUEST['book_id'];
$update=$_REQUEST['update'];

$sql="UPDATE `publisher_book_requirement` SET `book_status` = '$update' WHERE `publisher_book_requirement`.`id` = '$book_id'";
$exe=mysql_query($sql);
header("Location: requirementview.php?book_id=$book_id&user_id=$user_id&suc=1");
}
else
{
header("Location: bookviewrequirementviewphp?book_id=$book_id&user_id=$user_id&&err=1");
}
?>