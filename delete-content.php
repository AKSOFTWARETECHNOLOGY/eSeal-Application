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
$content_id=$_REQUEST['id'];
$content_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `writer_content` WHERE `id`='$content_id' AND `user_id`='$user_id'");

header("Location: dashboard.php?succ=1&msg=all#content");

}
else
{
header("Location: dashboard.php?err=1&msg=all#content");
} 	
	
?>
                            
						