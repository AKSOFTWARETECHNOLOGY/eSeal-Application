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
$language_id=$_REQUEST['id'];
$language_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `languages` WHERE `id`='$language_id'");

header("Location: languagelist.php?succ=1&msg=all");

}
else
{
header("Location: languagelist.php?err=1&msg=all");
} 	
	
?>
                            
						