<?php session_start();
ob_start();

if(!isset($_SESSION['nextpubuserid']))
{
	header("Location: login.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";


$user_id=$_SESSION['nextpubuserid'];
$user_role=$_SESSION['nextpubuserrole'];
$user_name=$_SESSION['nextpubusername'];
$user_email=$_SESSION['nextpubuseremail'];


if(isset($_REQUEST['delete']))
{
$book_id=$_REQUEST['id'];
$book_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `publisher_book` WHERE `id`='$book_id' AND `user_id`='$user_id'");

header("Location: dashboard.php?succ=1&msg=all#book");

}
else
{
header("Location: dashboard.php?err=1&msg=all#book");
} 	
	
?>
                            
						