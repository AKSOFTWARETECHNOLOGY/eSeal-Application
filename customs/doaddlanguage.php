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

if(isset($_REQUEST['addlanguage']))
{
$language_name=$_REQUEST['language_name'];
$language_date=date("Y-m-d");

$insert_language_sql="INSERT INTO `languages` (`language_name`,`language_status`) 
						VALUES ('$language_name', '1')";


$insert_language_exe=mysql_query($insert_language_sql);	

header("Location: addlanguage.php?succ=1&msg=all");

}
else
{
header("Location: addlanguage.php?err=1&msg=all");
} 	
	
?>
                            
						