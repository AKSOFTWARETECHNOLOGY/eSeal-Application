<?php session_start();
ob_start();

if(!isset($_SESSION['nextpubuserid']))
{
	header("Location: login.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";


$user_id=$_SESSION['nextpubuserid'];
$user_role=$_SESSION['nextpubuserrole'];
$user_name=$_SESSION['nextpubusername'];
$user_email=$_SESSION['nextpubuseremail'];


if(isset($_REQUEST['addlanguage']))
{
$languages=$_REQUEST['languages'];
$content_date=date("Y-m-d");


$delete = mysql_query("DELETE FROM `language_user` WHERE `user_id`='$user_id'");

	foreach($languages as $language)
	{
	$insert_language_sql="INSERT INTO `language_user` (`user_id`, `language_id`) 
							VALUES ('$user_id', '$language')";
	$insert_language_exe=mysql_query($insert_language_sql);									
	}

	header("Location: dashboard.php?succ=1&msg=all#language");	
	//header("Location: edit-language.php?succ=1&msg=all");

}
else
{
header("Location: edit-language.php?err=1&msg=all");
} 	
	
?>
                            
						