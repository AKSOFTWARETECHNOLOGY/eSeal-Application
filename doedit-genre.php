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


if(isset($_REQUEST['addgenre']))
{
$genres=$_REQUEST['genres'];
$content_date=date("Y-m-d");


$delete = mysql_query("DELETE FROM `genre_user` WHERE `user_id`='$user_id'");

	foreach($genres as $genre)
	{
	$insert_genres_sql="INSERT INTO `genre_user` (`user_id`, `genre_id`) 
							VALUES ('$user_id', '$genre')";
	$insert_genres_exe=mysql_query($insert_genres_sql);									
	}
	
	header("Location: dashboard.php?succ=1&msg=all#genre");
	//header("Location: edit-genre.php?succ=1&msg=all");

}
else
{
header("Location: edit-genre.php?err=1&msg=all");
} 	
	
?>
                            
						