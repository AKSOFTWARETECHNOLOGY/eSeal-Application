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


if(isset($_REQUEST['enquiry_id']))
{
    $enquiryId=$_REQUEST['enquiry_id'];
    $subject=$_REQUEST['subject'];
    $message=$_REQUEST['message'];
    $senderId=$user_id;
    $receiverId="2";
    $username = "User";
    $date = date("Y-m-d");

    $insert_complaint_sq1 = "INSERT INTO `complaint_enquiry` (sender_id, receiver_id, subject, message, enquiry_id, created_by, updated_by, created_at, updated_at)
VALUES ('$senderId','$receiverId', '$subject', '$message','$enquiryId','$username','$username','$date','$date')";
    $insert_complaint_exe=mysql_query($insert_complaint_sq1);

    $sql = "UPDATE `complaint_enquiry` SET `read_status` = '0', `updated_by` = '$user_name', `updated_at` = '$date'
            WHERE `complaint_enquiry`.`id` = '$enquiryId'";
    $exe = mysql_query($sql);

    header("Location: my-complaint.php?success=1&msg=all");
}

else{
    header("Location: my-complaint.php?error=1&msg=all");
}



?>

