<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$customsName = $_REQUEST['customsName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$telephone = $_REQUEST['telephone'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$port = $_REQUEST['port'];
$terminal = $_REQUEST['terminal'];
$customscode = $_REQUEST['customscode'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$pwd = md5('123456');

$user_sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$customsName','$email','$pwd','1','1', '$date','$date')";
$user_exe = mysql_query($user_sql);
$last_id = mysql_insert_id();

$role_sql = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 4)";
$role_exe = mysql_query($role_sql);

$insert_customs_sq1 = "INSERT INTO `customs_info` (user_id, name_customs, address, city, state, country, telephone, mobile, email, customs_code, port, terminal, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id','$customsName','$address','$cityId','$state','$countryId','$telephone','$mobile','$email','$customscode','$port','$terminal','$username','$username','$date','$date')";
$insert_customs_exe = mysql_query($insert_customs_sq1);

header("Location: customslist.php?suc=1");

?>