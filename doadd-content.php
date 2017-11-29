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


if(isset($_REQUEST['addcontent']))
{
$content_title=$_REQUEST['content_title'];
$content_info=$_REQUEST['content_info'];
$content_language=$_REQUEST['content_language'];
$content_genre=$_REQUEST['content_genre'];
$content_photo=$_REQUEST['content_photo'];
$content_attach=$_REQUEST['content_attach'];
$content_date=date("Y-m-d");


	if($_FILES["content_photo"]["name"]!="")
	{
	$time=time()."_";
	$file_exts = array("jpg", "jpeg", "png","gif");
	$upload_exts = end(explode(".", $_FILES["content_photo"]["name"]));
	$file_name="uploads/content/".$time.$_FILES["content_photo"]["name"];	
	move_uploaded_file($_FILES["content_photo"]["tmp_name"],$file_name);
	$content_photo=$file_name;
	
	
	$time=time()."_";
	$file_attach_exts = array("jpg", "jpeg", "png","gif");
	$upload_attach_exts = end(explode(".", $_FILES["content_attach"]["name"]));
	$file_attach_name="uploads/content-document/".$time.$_FILES["content_attach"]["name"];	
	move_uploaded_file($_FILES["content_attach"]["tmp_name"],$file_attach_name);
	$content_attach=$file_attach_name;
	
	
	$insert_content_sql="INSERT INTO `writer_content` (`user_id`, `content_title`, `content_info`, `content_language`, `content_genre`, `content_photo`, `content_attach`) 
							VALUES ('$user_id', '$content_title', '$content_info', '$content_language', '$content_genre', '$content_photo', '$content_attach')";

	$insert_content_exe=mysql_query($insert_content_sql);								
	
	header("Location: dashboard.php?succ=1&msg=all#content");
	//header("Location: add-content.php?succ=1&msg=all");
	}
	else
	{
		
	header("Location: dashboard.php?succ=1&msg=all#content");	
	//header("Location: add-content.php?err=1&msg=all");
	} 	




}
else
{
header("Location: add-content.php?err=1&msg=all");
} 	
	
?>
                            
						