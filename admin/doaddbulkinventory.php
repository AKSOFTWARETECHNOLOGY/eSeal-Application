<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$prodId = $_REQUEST['productId'];
$noofeseal = $_REQUEST['noofeseal'];
$startsealcode = $_REQUEST['startsealcode'];
$endsealcode = $_REQUEST['endsealcode'];
$salePrice = $_REQUEST['productPrice'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");


$seal = str_replace('SSGA', '', $startsealcode);

for($i=0;$i<$noofeseal;$i++)
{

$maxseal =  $seal + $i;
$sealcode = 'SSGA' . $maxseal;

$maxseal =  $seal + $i;
$maxseal = str_pad($maxseal, 8, '0', STR_PAD_LEFT);
$sealcode = 'SSGA' . $maxseal;

$unicode=$sealcode;

$replacements = array('S' => 'N','G' => 'O','A' => 'P','0' => 'Q','1' => 'R','2' => 'S','3' => 'T',
	'4' => 'U','5' => 'V','6' => 'W','7' => 'X','8' => 'Y','9' => 'Z');
$unicode_eseal = str_replace(array_keys($replacements), $replacements, $sealcode);
$replacements_eseal = array('N' => '53','O' => '47','P' => '41','Q' => '30','R' => '31','S' => '32','T' => '33',
	'U' => '34','V' => '35','W' => '36','X' => '37','Y' => '38','Z' => '39');
$unicode = str_replace(array_keys($replacements_eseal), $replacements_eseal, $unicode_eseal);

$sql = "INSERT INTO `product_info` (user_id, product_id, product_unicode, product_sealcode, product_sale_price, created_by, updated_by, created_at, updated_at)
VALUES ('$user_id','$prodId','$unicode','$sealcode','$salePrice','$username','$username','$date','$date')";
$exe = mysql_query($sql);


}
header("Location: inventorieslist.php?suc=1");
?>