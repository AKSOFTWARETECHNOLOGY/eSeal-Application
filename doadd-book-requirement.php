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


if(isset($_REQUEST['addbook']))
{
$book_title=$_REQUEST['book_title'];
$book_info=$_REQUEST['book_info'];
$book_language=$_REQUEST['book_language'];
$book_genre=$_REQUEST['book_genre'];
$book_photo=$_REQUEST['book_photo'];
$book_attach=$_REQUEST['book_attach'];
$book_date=date("Y-m-d");


	if($_FILES["book_photo"]["name"]!="")
	{
	$time=time()."_";
	$file_exts = array("jpg", "jpeg", "png","gif");
	$upload_exts = end(explode(".", $_FILES["book_photo"]["name"]));
	$file_name="uploads/requirement/".$time.$_FILES["book_photo"]["name"];	
	move_uploaded_file($_FILES["book_photo"]["tmp_name"],$file_name);
	$book_photo=$file_name;
	
	$time=time()."_";
	$file_attach_exts = array("jpg", "jpeg", "png","gif");
	$upload_attach_exts = end(explode(".", $_FILES["book_attach"]["name"]));
	$file_attach_name="uploads/requirement-document/".$time.$_FILES["book_attach"]["name"];	
	move_uploaded_file($_FILES["book_attach"]["tmp_name"],$file_attach_name);
	$book_attach=$file_attach_name;
	
	
	$insert_book_sql="INSERT INTO `publisher_book_requirement` (`user_id`, `book_title`, `book_info`, `book_language`, `book_genre`, `book_photo`, `book_attach`) 
							VALUES ('$user_id', '$book_title', '$book_info', '$book_language', '$book_genre', '$book_photo', '$book_attach')";

	$insert_book_exe=mysql_query($insert_book_sql);	

	header("Location: dashboard.php?succ=1&msg=all#requirement");
	//header("Location: add-book.php?succ=1&msg=all");
	}
	else
	{
		
	header("Location: dashboard.php?succ=1&msg=all#requirement");		
	//header("Location: add-book.php?err=1&msg=all");
	} 	

}
else
{
header("Location: add-book-requirement.php?err=1&msg=all");
} 	
	
?>
                            
						