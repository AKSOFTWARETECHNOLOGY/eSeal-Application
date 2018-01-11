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

if(isset($_REQUEST['addaddress']))
{

$content_id = $_REQUEST['id'];
$name = $_REQUEST['personName'];
$address = $_REQUEST['address'];
$city = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$country = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$mobile = $_REQUEST['mobile'];
$username = "User";
$date = date("Y-m-d");


$update = mysql_query("UPDATE `exporter_address` SET
                    `name`='$name',`address`='$address',`city`='$city',`state`='$state',`country`='$country',`pincode`='$pincode',`mobile`='$mobile'
                     WHERE `id`='$content_id' AND `user_id`='$user_id'");

header("Location: view-address-book.php?id=$content_id&success=1&update=1");


/*
                $insert_address_sq1 = "INSERT INTO `exporter_address` (user_id, name, address, city, state, country, pincode,  mobile, created_by, updated_by, created_at, updated_at)
VALUES ('$user_id','$personName','$address','$cityId','$state','$countryId','$pincode','$mobile','$username','$username','$date','$date')";

                $insert_address_exe = mysql_query($insert_address_sq1);


header("Location: add-address-book.php?success=1&insert=1");
*/

}
else
{

header("Location: view-address-book.php?id=$content_id&error=1&update=1");

/*

header("Location: add-address-book.php?error=1&insert=1");

*/

} 	
	
?>
                            
						