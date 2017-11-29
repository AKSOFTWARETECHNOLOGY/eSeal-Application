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


if(isset($_REQUEST['profileupdate']))
{

$name=$_REQUEST['name'];
$telephone=$_REQUEST['mobile'];
$address=$_REQUEST['address'];
$bio=$_REQUEST['bio'];
$city=$_REQUEST['city'];
$photo=$_REQUEST['photo'];

if($user_role==2) {

$update_sql="UPDATE `writer` SET `name`='$name',`address`='$address',`city`='$city',`bio`='$bio',`telephone`='$telephone' WHERE `user_id` = $user_id";
$update_exe=mysql_query($update_sql);
$user_update_sql="UPDATE `users` SET `name`='$name' WHERE `id` = $user_id";
$user_update_exe=mysql_query($user_update_sql);
if($_FILES["photo"]["name"]!="")
{
$time=time()."_";
$file_exts = array("jpg", "jpeg", "png","gif");
$upload_exts = end(explode(".", $_FILES["photo"]["name"]));
$file_name="uploads/photo/".$time.$_FILES["photo"]["name"];	
move_uploaded_file($_FILES["photo"]["tmp_name"],$file_name);
$photo_update_sql="UPDATE `writer` SET `photo`='$file_name' WHERE `user_id` = $user_id";
$photo_update_exe=mysql_query($photo_update_sql);
}

}


if($user_role==7) {

$update_sql="UPDATE `publisher` SET `name`='$name',`address`='$address',`city`='$city',`bio`='$bio',`telephone`='$telephone' WHERE `user_id` = $user_id";
$update_exe=mysql_query($update_sql);
$user_update_sql="UPDATE `users` SET `name`='$name' WHERE `id` = $user_id";
$user_update_exe=mysql_query($user_update_sql);
if($_FILES["photo"]["name"]!="")
{
$time=time()."_";
$file_exts = array("jpg", "jpeg", "png","gif");
$upload_exts = end(explode(".", $_FILES["photo"]["name"]));
$file_name="uploads/photo/".$time.$_FILES["photo"]["name"];	
move_uploaded_file($_FILES["photo"]["tmp_name"],$file_name);
$photo_update_sql="UPDATE `publisher` SET `photo`='$file_name' WHERE `user_id` = $user_id";
$photo_update_exe=mysql_query($photo_update_sql);
}

}
header("Location: dashboard.php?succ=1&msg=all");
//header("Location: edit-profile.php?succ=1&msg=all");
}
else
{
header("Location: edit-profile.php?err=1&msg=all");
} 	
	
?>
                            
						