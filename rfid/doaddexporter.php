<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$exporterName = $_REQUEST['exporterName'];
$personName = $_REQUEST['personName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$telephone = $_REQUEST['telephone'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$gstin = $_REQUEST['gstin'];
$panNumber = $_REQUEST['panNumber'];
$icecode = $_REQUEST['icecode'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$pwd = md5('123456');

$sql = "INSERT INTO `users` (name, email, password, confirmed, created_at, updated_at) VALUES ('$exporterName','$email','$pwd','1','$date','$date')";
$exe = mysql_query($sql);
$last_id = mysql_insert_id();

$s = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 3)";
$e = mysql_query($s);

$insert_exporter_sq1 = "INSERT INTO `exporter_info` (user_id, name_exporter, name_person, address, city, state, country, pincode, telephone, mobile, email, gstin, pan_number, iec_code, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id','$exporterName','$personName','$address','$cityId','$state','$countryId','$pincode','$telephone','$mobile','$email','$gstin','$panNumber','$icecode','$username','$username','$date','$date')";
$insert_exporter_exe = mysql_query($insert_exporter_sq1);

$insert_address_sq1 = "INSERT INTO `exporter_address` (user_id, name, address, city, state, country, pincode,  mobile, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id','$personName','$address','$cityId','$state','$countryId','$pincode','$mobile','$username','$username','$date','$date')";

$insert_address_exe = mysql_query($insert_address_sq1);


header("Location: exporterlist.php?suc=1");

?>