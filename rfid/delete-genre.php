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
$genre_id=$_REQUEST['id'];
$genre_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `genres` WHERE `id`='$genre_id'");

header("Location: genrelist.php?succ=1&msg=all");

}
else
{
header("Location: genrelist.php?err=1&msg=all");
} 	
	
?>
                            
						