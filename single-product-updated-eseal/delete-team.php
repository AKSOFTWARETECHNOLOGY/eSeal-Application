<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
    header("Location: login.php");
}

include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];


if(isset($_REQUEST['delete']))
{
$content_id=$_REQUEST['id'];
$content_status=$_REQUEST['delete'];
$content_date=date("Y-m-d");


$delete = mysql_query("UPDATE `users` SET `delete_status`='$content_status' WHERE `id`='$content_id'");

$delete = mysql_query("UPDATE `brancher_info` SET `status`='$content_status' WHERE `user_id`='$content_id'");

header("Location: view-team.php?id=$content_id&success=1&delete=$content_status");

}
else
{

header("Location: view-team.php?id=$content_id&error=1&delete=$content_status");

} 	
	
?>
                            
						