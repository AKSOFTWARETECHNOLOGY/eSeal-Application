<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$prodId = $_REQUEST['productId'];
$unicode = $_REQUEST['unicode'];
$sealcode = $_REQUEST['sealcode'];
$unicode = $_REQUEST['sealcode'];
$salePrice = $_REQUEST['productPrice'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$replacements = array('S' => '53','S' => '53','G' => '47','A' => '41','0' => '30','1' => '31','2' => '32','3' => '33',
	'4' => '34','5' => '35','6' => '36','7' => '37','8' => '38','9' => '39');
	
$replacements = array('S' => 'N','G' => 'O','A' => 'P','0' => 'Q','1' => 'R','2' => 'S','3' => 'T',
	'4' => 'U','5' => 'V','6' => 'W','7' => 'X','8' => 'Y','9' => 'Z');
	
echo $sealcode;
echo "<br/>";
echo $unicode_eseal = str_replace(array_keys($replacements), $replacements, $sealcode);
echo "<br/>";
//exit;
$replacements_eseal = array('N' => '53','O' => '47','P' => '41','Q' => '30','R' => '31','S' => '32','T' => '33',
	'U' => '34','V' => '35','W' => '36','X' => '37','Y' => '38','Z' => '39');
echo "<br/>";
echo $unicode = str_replace(array_keys($replacements_eseal), $replacements_eseal, $unicode_eseal);
echo "<br/>";
//exit;
$sql = "INSERT INTO `product_info` (user_id, product_id, product_unicode, product_sealcode, product_sale_price, created_by, updated_by, created_at, updated_at)
VALUES ('$user_id','$prodId','$unicode','$sealcode','$salePrice','$username','$username','$date','$date')";

$exe = mysql_query($sql);
header("Location: inventorieslist.php?suc=1");

?>