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
$requirement_id=$_REQUEST['id'];
$requirement_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `publisher_book_requirement` WHERE `id`='$requirement_id'");

header("Location: requirementlist.php?succ=1&msg=all");

}
else
{
header("Location: requirementlist.php?err=1&msg=all");
} 	
	
?>
                            
						