<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

if(isset($_REQUEST['enquiry_id']))
{
    $enquiryId=$_REQUEST['enquiry_id'];
    $subject=$_REQUEST['subject'];
    $message=$_REQUEST['message'];
    $receiverId=$_REQUEST['receiverId'];
    $username = "User";
    $date = date("Y-m-d");

    $insert_complaint_sq1 = "INSERT INTO `complaint_enquiry` (sender_id, receiver_id, subject, message, enquiry_id, created_by, updated_by, created_at, updated_at)
VALUES ('2','$receiverId', '$subject', '$message','$enquiryId','$username','$username','$date','$date')";
    $insert_complaint_exe=mysql_query($insert_complaint_sq1);

    $sql = "UPDATE `complaint_enquiry` SET `read_status` = '0', `updated_by` = '$user_name', `updated_at` = '$date'
            WHERE `complaint_enquiry`.`id` = '$enquiryId'";
    $exe = mysql_query($sql);

    header("Location: complaintlist.php?succ=1&msg=all");
}

else{
    header("Location: complaintlist.php?err=1&msg=all");
}



?>

