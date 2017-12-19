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

if(isset($_REQUEST['customs_id'])) {
    $customs_id = $_REQUEST['customs_id'];
    $userId = $_REQUEST['userId'];
    $customsName = $_REQUEST['customsName'];
    $address = $_REQUEST['address'];
    $cityId = $_REQUEST['cityId'];
    $state = $_REQUEST['state'];
    $countryId = $_REQUEST['countryId'];
    $telephone = $_REQUEST['telephone'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $customscode = $_REQUEST['customscode'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `customs_info` SET `name_customs` = '$customsName', `user_id` = '$userId',`address` = '$address', `city` = '$cityId',
`state` = '$state',`country` = '$countryId',`mobile` = '$mobile', `email` = '$email',`telephone` = '$telephone',`customs_code` = '$customscode',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `customs_info`.`id` = '$customs_id'";
    $exe = mysql_query($sql);
    header("Location: customslist.php?suc=1");
}
else{
    header("Location: exporterlist.php?err=1");
}

?>