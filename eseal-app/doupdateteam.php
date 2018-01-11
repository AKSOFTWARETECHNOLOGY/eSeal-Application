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

if(isset($_REQUEST['addteam']))
{
$content_id=$_REQUEST['id'];
$personName = $_REQUEST['personName'];
$name = $_REQUEST['personName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$mobile = $_REQUEST['mobile'];
$username = "User";
$date = date("Y-m-d");
$role = 6;

$joindate=date("Y-m-d");


    $update_exporter_sq1 = "UPDATE `brancher_info` SET
    name_person='$personName', address='$address', city='$cityId', state='$state', country='$countryId', pincode='$pincode', mobile='$mobile'
    WHERE `user_id`='$content_id'";

    $update_exporter_exe = mysql_query($update_exporter_sq1);

    header("Location: view-team.php?id=$content_id&success=1&update=1");

}
else
{
    header("Location: view-team.php?id=$content_id&error=1&update=1");

} 	
	
?>
                            
						