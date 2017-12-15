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

$delete = mysql_query("DELETE FROM `exporter_address` WHERE `id`='$content_id' AND `user_id`='$user_id'");

header("Location: address-book.php?success=1&delete=1");

}
else
{
header("Location: address-book.php?error=1&delete=1");
} 	
	
?>
                            
						