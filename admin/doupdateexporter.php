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

if(isset($_REQUEST['exporter_id'])) {
    $exporter_id = $_REQUEST['exporter_id'];
    $userId = $_REQUEST['userId'];
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

    $sql = "UPDATE `exporter_info` SET `name_exporter` = '$exporterName', `name_person` = $personName, `user_id` = '$userId',
`address` = '$address', `city` = '$cityId', `state` = '$state',`country` = '$countryId',`mobile` = '$mobile', `email` = '$email',
 `pincode` = '$pincode', `telephone` = '$telephone',`gstin` = '$gstin', `pan_number` = '$panNumber',`ice_code` = '$icecode',
            `updated_by` = '$username', `updated_at` = '$date'
            WHERE `exporter_info`.`id` = '$exporter_id'";
    $exe = mysql_query($sql);
    header("Location: exporterlist.php?suc=1");
}
else{
    header("Location: exporterlist.php?err=1");
}

?>