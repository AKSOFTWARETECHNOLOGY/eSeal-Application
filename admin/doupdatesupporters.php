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

if(isset($_REQUEST['support_id'])) {
    $support_id = $_REQUEST['support_id'];
    $userId = $_REQUEST['userId'];
    $supportName = $_REQUEST['supportName'];
    $address = $_REQUEST['address'];
    $cityId = $_REQUEST['cityId'];
    $state = $_REQUEST['state'];
    $countryId = $_REQUEST['countryId'];
    $pincode = $_REQUEST['pincode'];
    $telephone = $_REQUEST['telephone'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $supportcode = $_REQUEST['supportcode'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `support_info` SET `name_support` = '$supportName', `user_id` = '$userId',`address` = '$address', `city` = '$cityId',
`state` = '$state',`country` = '$countryId',`pincode` = '$pincode', `mobile` = '$mobile', `email` = '$email',`telephone` = '$telephone',`support_code` = '$supportcode',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `support_info`.`id` = '$support_id'";
    $exe = mysql_query($sql);
    header("Location: supporterslist.php?suc=1");
}
else{
    header("Location: supporterslist.php?err=1");
}

?>