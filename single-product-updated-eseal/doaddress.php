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

$personName = $_REQUEST['personName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$mobile = $_REQUEST['mobile'];
$username = "User";
$date = date("Y-m-d");



                $insert_address_sq1 = "INSERT INTO `exporter_address` (user_id, name, address, city, state, country, pincode,  mobile, created_by, updated_by, created_at, updated_at)
VALUES ('$user_id','$personName','$address','$cityId','$state','$countryId','$pincode','$mobile','$username','$username','$date','$date')";

                $insert_address_exe = mysql_query($insert_address_sq1);


				header("Location: add-address-book.php?success=1&msg=all");
				

}
else
{
header("Location: add-address-book.php?err=1&msg=all");
} 	
	
?>
                            
						