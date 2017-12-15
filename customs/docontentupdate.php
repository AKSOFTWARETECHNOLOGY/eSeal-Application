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
$content_id=$_REQUEST['content_id'];
$update=$_REQUEST['update'];

$sql="UPDATE `writer_content` SET `content_status` = '$update' WHERE `writer_content`.`id` = '$content_id'";
$exe=mysql_query($sql);
header("Location: contentview.php?content_id=$content_id&user_id=$user_id&suc=1");
}
else
{
header("Location: contentview.php?content_id=$content_id&user_id=$user_id&err=1");
}
?>