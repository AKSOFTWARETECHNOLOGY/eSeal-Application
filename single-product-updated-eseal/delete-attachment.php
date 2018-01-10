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


$delete = mysql_query("UPDATE `eseal_attachment` SET `eseal_attachment_status`='0' WHERE `id`='$content_id'");

header("Location: my-seal-status.php?success=1");

}
else
{

header("Location: my-seal-status.php?error=1");

} 	
	
?>
                            
						