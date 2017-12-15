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
$content_date=date("Y-m-d");

$delete = mysql_query("UPDATE `users` SET `delete_status`='0' WHERE `id`='$content_id'");

header("Location: my-team.php?success=1&delete=1");

}
else
{
header("Location: my-team.php?error=1&delete=1");
} 	
	
?>
                            
						