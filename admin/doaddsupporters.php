<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$supportsName = $_REQUEST['usersName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$telephone = $_REQUEST['telephone'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$supportscode = $_REQUEST['userscode'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$pwd = md5('123456');

$user_sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$supportsName','$email','$pwd','1','1', '$date','$date')";
$user_exe = mysql_query($user_sql);
$last_id = mysql_insert_id();

$role_sql = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 5)";
$role_exe = mysql_query($role_sql);

$insert_support_sq1 = "INSERT INTO `support_info` (user_id, name_support, address, city, state, country, pincode, telephone, mobile, email, support_code, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id','$supportsName','$address','$cityId','$state','$countryId','$pincode','$telephone','$mobile','$email','$supportscode','$username','$username','$date','$date')";
$insert_support_exe = mysql_query($insert_support_sq1);

header("Location: supporterslist.php?suc=1");

?>