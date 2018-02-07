<?php
include("config.php");
$data = array();

$parameters_json=json_decode(file_get_contents('php://input'),TRUE);

if($parameters_json)
{
$_POST['sealnumber']=$parameters_json['sealnumber'];
$_POST['portid']=$parameters_json['portid'];
$_POST['submit']=$parameters_json['submit'];
}

$server_path="http://www.cauverynews.tv/sites/default/files/styles/category/public/";
$server_path="http://www.cauverynews.tv/sites/default/files/";

//echo html_entity_decode(json_encode($parameters_json));


$sealnumber=$parameters_json['sealnumber'];
$portid=$parameters_json['portid'];

$sealnumber=$_REQUEST['sealnumber'];
$portid=$_REQUEST['portid'];

$sealnumber=str_replace("-","",$_REQUEST['sealnumber']);

$active="1";

$customs_approve_status="1";
$customs_approve_date=date("Y-m-d");
$customs_approve_time=date("h:i:s");

$sql="UPDATE `product_order_info` SET `customs_approve_status` = '$customs_approve_status',`customs_approve_date` = '$customs_approve_date',`customs_approve_time` = '$customs_approve_time'
WHERE product_unicode = '$sealnumber' AND destination_port='$portid' LIMIT 1";
$exe=mysql_query($sql);

//$node_sql_query = "SELECT * FROM product_order_info WHERE product_sealcode = '$sealnumber' AND destination_port='$portid' LIMIT 1";
$node_sql_query = "SELECT * FROM product_order_info WHERE product_unicode = '$sealnumber' AND destination_port='$portid' LIMIT 1";

$node_sql_query = "SELECT poi.*, `exporter_info`.`name_exporter`, products.product_name, ports.ports_name,terminals.terminals_name
FROM `product_order_info` AS `poi`
LEFT JOIN `product_order` ON product_order.id = poi.product_order_id
LEFT JOIN `products` ON products.id = poi.product_id
LEFT JOIN `exporter_info` ON exporter_info.user_id = product_order.product_exporter_id
LEFT JOIN `ports` ON ports.id = poi.destination_port
LEFT JOIN `terminals` ON terminals.id = poi.terminal_name
WHERE product_unicode = '$sealnumber' AND destination_port='$portid' LIMIT 1";

//$node_sql_query = "SELECT * FROM product_order_info WHERE product_sealcode = '$sealnumber' LIMIT 1";
//$data['SQL']=$node_sql_query;

$node_sql = mysql_query($node_sql_query);
$node_count = mysql_num_rows($node_sql);
if($node_count)
	{
		$data['isSuccess']="1";
		$data['message']="data Fetched Successfully";
		
		 
		$i=0;
		while($node_fetch = mysql_fetch_array($node_sql))
		{	
			//print_r($node_fetch);

			$data['eseal']['product_sealcode']=$node_fetch['product_sealcode'];
			
			$data['eseal']['shipping_no']=$node_fetch['shipping_no'];

			$data['eseal']['shipping_date']=$node_fetch['shipping_date'];
	
			
			
			$data['eseal']['container_no']=$node_fetch['container_no'];
			
			$data['eseal']['container_size']=$node_fetch['container_size'];

			$data['eseal']['trailer_truck_no']=$node_fetch['trailer_truck_no'];
			
			
			
			$data['eseal']['seal_type']=$node_fetch['seal_type'];
			
			$data['eseal']['cfs_reach_time']=$node_fetch['cfs_reach_time'];

			$data['eseal']['sealing_date']=$node_fetch['sealing_date'];
	
			$data['eseal']['sealing_time']=$node_fetch['sealing_time'];
	
	

			$data['eseal']['destination_port']=$node_fetch['ports_name'];
	
			$data['eseal']['terminal_name']=$node_fetch['terminals_name'];
	
	
			
			$data['eseal']['driver_name']=$node_fetch['driver_name'];
			
			$data['eseal']['driver_number']=$node_fetch['driver_number'];
			
			$data['eseal']['driver_licence']=$node_fetch['driver_licence'];
			
			
			
			$data['eseal']['product_exporter_id']=$node_fetch['product_exporter_id'];
			
			$data['eseal']['product_exporter_name']=$node_fetch['name_exporter'];
			
			$data['eseal']['product_exporter_iec_no']=$node_fetch['iec_no'];
			
			$data['eseal']['product_exporter_pan_no']=$node_fetch['pan_no'];
			
			$data['eseal']['product_exporter_gst_no']=$node_fetch['gst_no'];
			
			
			
			$data['eseal']['form_no']=$node_fetch['form_no'];
			
			$data['eseal']['eway_no']=$node_fetch['eway_no'];
	
			$data['eseal']['notes']=$node_fetch['notes'];
			
		
			 	
			
			for($i=0;$i<1;$i++)
			{
			
			$data['eseal']['scans'][$i]['customs_approve_status']=$node_fetch['customs_approve_status'];

			$data['eseal']['scans'][$i]['customs_approve_note']=$node_fetch['terminals_name'].'-'.$node_fetch['ports_name'];
			
			$data['eseal']['scans'][$i]['customs_approve_date']=$node_fetch['customs_approve_date'];
			
			$data['eseal']['scans'][$i]['customs_approve_time']=$node_fetch['customs_approve_time'];
			
			}
			
			
			$i++;
			
		}
		
	
	}
	else
	{
	$data['isSuccess']="0";
	$data['message']="data Not Fetched / Invalid Request";
	}

echo html_entity_decode(json_encode($data));

/*
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body>'; 
print_r($data);
echo '</body></html>';
*/
?>