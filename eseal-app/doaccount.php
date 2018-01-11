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



if(isset($_REQUEST['profileupdate']))
{

    $name_exporter=$_REQUEST['name_exporter'];
    $name_person=$_REQUEST['name_person'];
    $gstin=$_REQUEST['gstin'];
    $pan_number=$_REQUEST['pan_number'];
    $address=$_REQUEST['address'];
    $city=$_REQUEST['city'];
    $state=$_REQUEST['state'];
    $country=$_REQUEST['country'];
    $pincode=$_REQUEST['pincode'];
    $telephone=$_REQUEST['telephone'];
    $mobile=$_REQUEST['mobile'];


    $update_sql="UPDATE `exporter_info` SET `name_exporter`='$name_exporter',`name_person`='$name_person',`gstin`='$gstin',`pan_number`='$pan_number',`address`='$address',`city`='$city',`state`='$state',`country`='$country',`pincode`='$pincode',`telephone`='$telephone',`mobile`='$mobile' WHERE `user_id` = $user_id";
    $update_exe=mysql_query($update_sql);
    $user_update_sql="UPDATE `users` SET `name`='$name_exporter' WHERE `id` = $user_id";
    $user_update_exe=mysql_query($user_update_sql);

      header("Location: my-account.php?success=1&msg=all");
//header("Location: edit-profile.php?succ=1&msg=all");
}
else
{
    header("Location: edit-account.php?error=1&msg=all");
}

?>
                            
						