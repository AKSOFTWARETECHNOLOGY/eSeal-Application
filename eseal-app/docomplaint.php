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


$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];
$senderId=$_REQUEST['senderId'];
$username = "User";
$date = date("Y-m-d");

$insert_complaint_sq1 = "INSERT INTO `complaint_enquiry` (sender_id, receiver_id, subject, message, enquiry_id, created_by, updated_by, created_at, updated_at)
VALUES ('$senderId','2','$subject','$message','0','$username','$username','$date','$date')";
$insert_complaint_exe=mysql_query($insert_complaint_sq1);

    header("Location: complaint-form.php?succ=1&msg=all");

?>

