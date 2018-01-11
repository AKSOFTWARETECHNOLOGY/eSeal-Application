<?php
include("config.php");
$data = array();

$parameters_json=json_decode(file_get_contents('php://input'),TRUE);

if($parameters_json)
{
$_POST['sealnumber']=$parameters_json['sealnumber'];
$_POST['portid']=$parameters_json['portid'];
$_POST['notes']=$parameters_json['notes'];
$_POST['submit']=$parameters_json['submit'];
}


$sealnumber=$parameters_json['sealnumber'];
$portid=$parameters_json['portid'];
$notes=$parameters_json['notes'];


$sealnumber=$_REQUEST['sealnumber'];
$portid=$_REQUEST['portid'];
$notes=$_REQUEST['notes'];

$active="1";
$node_sql_query = "SELECT * FROM product_order_info WHERE product_sealcode = '$sealnumber' AND destination_port='$portid' LIMIT 1";
//$node_sql_query = "SELECT * FROM product_order_info WHERE product_sealcode = '$sealnumber' LIMIT 1";
//$data['SQL']=$node_sql_query;

$node_sql = mysql_query($node_sql_query);
$node_count = mysql_num_rows($node_sql);
if($node_count)
	{
	$data['isSuccess']="1";
	$data['message']="data Saved Successfully";
	}
	else
	{
	$data['isSuccess']="0";
	$data['message']="data Not Saved";
	}

echo html_entity_decode(json_encode($data));

/*
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body>'; 
print_r($data);
echo '</body></html>';
*/
?>