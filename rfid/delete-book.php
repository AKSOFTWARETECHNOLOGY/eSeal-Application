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
$book_id=$_REQUEST['id'];
$book_date=date("Y-m-d");

$delete = mysql_query("DELETE FROM `publisher_book` WHERE `id`='$book_id'");

header("Location: booklist.php?succ=1&msg=all");

}
else
{
header("Location: booklist.php?err=1&msg=all");
} 	
	
?>
                            
						