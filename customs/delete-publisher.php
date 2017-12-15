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
$user_id=$_REQUEST['id'];
$user_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `users` WHERE `id`='$user_id'");

$delete = mysql_query("DELETE FROM `publisher` WHERE `user_id`='$user_id'");
//$delete = mysql_query("DELETE FROM `role_user` WHERE `user_id`='$user_id'");

header("Location: publisherlist.php?succ=1&msg=all");

}
else
{
header("Location: publisherlist.php?err=1&msg=all");
} 	
	
?>
                            
						