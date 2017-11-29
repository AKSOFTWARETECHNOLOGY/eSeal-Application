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

$sql="UPDATE `publisher_book` SET `book_status` = '$update' WHERE `publisher_book`.`id` = '$book_id'";
$exe=mysql_query($sql);
header("Location: bookview.php?book_id=$book_id&user_id=$user_id&suc=1");
}
else
{
header("Location: bookview.php?book_id=$book_id&user_id=$user_id&&err=1");
}
?>