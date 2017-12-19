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

if(isset($_REQUEST['addbook']))
{
$book_title=$_REQUEST['book_title'];
$book_info=$_REQUEST['book_info'];
$book_language=$_REQUEST['book_language'];
$book_genre=$_REQUEST['book_genre'];
$book_photo=$_REQUEST['book_photo'];
$book_attach=$_REQUEST['book_attach'];
$book_date=date("Y-m-d");
$book_status=1;

	if($_FILES["book_photo"]["name"]!="")
	{
	$time=time()."_";
	$file_exts = array("jpg", "jpeg", "png","gif");
	$upload_exts = end(explode(".", $_FILES["book_photo"]["name"]));
	$file_name="uploads/book/".$time.$_FILES["book_photo"]["name"];	
	$file_name_upload="../uploads/book/".$time.$_FILES["book_photo"]["name"];	
	move_uploaded_file($_FILES["book_photo"]["tmp_name"],$file_name_upload);
	$book_photo=$file_name_upload;
	
	
	$time=time()."_";
	$file_attach_exts = array("jpg", "jpeg", "png","gif");
	$upload_attach_exts = end(explode(".", $_FILES["book_attach"]["name"]));
	$file_attach_name="uploads/book-document/".$time.$_FILES["book_attach"]["name"];
	$file_attach_name_upload="../uploads/book/".$time.$_FILES["book_photo"]["name"];		
	move_uploaded_file($_FILES["book_attach"]["tmp_name"],$file_attach_name);
	$book_attach=$file_attach_name_upload;
	
	
	$insert_book_sql="INSERT INTO `publisher_book` (`user_id`, `book_title`, `book_info`, `book_language`, `book_genre`, `book_photo`, `book_attach`, `book_status`) 
							VALUES ('$user_id', '$book_title', '$book_info', '$book_language', '$book_genre', '$book_photo', '$book_attach', '$book_status')";

	
	$insert_book_exe=mysql_query($insert_book_sql);	

	header("Location: addbook.php?succ=1&msg=all");
	//header("Location: add-book.php?succ=1&msg=all");
	}
	else
	{
		
	header("Location: addbook.php?succ=1&msg=all");		
	//header("Location: add-book.php?err=1&msg=all");
	} 	

}
else
{
header("Location: addbook.php?err=1&msg=all");
} 	
	
?>
                            
						