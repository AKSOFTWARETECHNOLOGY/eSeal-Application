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

if(isset($_REQUEST['addgenre']))
{
$genre_name=$_REQUEST['genre_name'];
$genre_date=date("Y-m-d");

$insert_genre_sql="INSERT INTO `genres` (`genre_name`,`genre_status`) 
						VALUES ('$genre_name', '1')";


$insert_genre_exe=mysql_query($insert_genre_sql);	

header("Location: addgenre.php?succ=1&msg=all");

}
else
{
header("Location: addgenre.php?err=1&msg=all");
} 	
	
?>
                            
						