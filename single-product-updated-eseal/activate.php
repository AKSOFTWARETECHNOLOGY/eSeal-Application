<?php session_start();
ob_start();

if(isset($_SESSION['exporteruserid']))
{
	header("Location: dashboard.php");
}

include "config.php";

if(isset($_REQUEST['id']))
{

$id=$_REQUEST['id'];
$activate_sql="UPDATE `users` SET `confirmed`='1' WHERE `id`='$id'";
$activate_exe = mysql_query($activate_sql);
header("Location: login.php?success=1&msg=all");
}
else
{
header("Location: index.php?err=1&msg=all");
} 	
	
?>
                            
						