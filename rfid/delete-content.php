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
$content_id=$_REQUEST['id'];
$content_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `writer_content` WHERE `id`='$content_id'");

header("Location: contentlist.php?succ=1&msg=all");

}
else
{
header("Location: contentlist.php?err=1&msg=all");
} 	
	
?>
                            
						