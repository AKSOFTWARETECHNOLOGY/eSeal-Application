<?php

include("config.php");

$data = array();

$parameters_json=json_decode(file_get_contents('php://input'),TRUE);


if($parameters_json){
$_POST['submit']=$parameters_json['submit'];
}

$active="1";



$latest_sql_query = "SELECT * FROM `ports` WHERE `ports_status`='1' ORDER BY `ports_name` ASC";
$latest_sql = mysql_query($latest_sql_query);
$latest_count = mysql_num_rows($latest_sql);
if($latest_count)	
{		
$data['isSuccess']="1";		
$data['message']="Data Fetched Successfully";		

$i=0;		
while($latest_fetch = mysql_fetch_array($latest_sql))		
{							

$data['ports'][$i]['id']=$latest_fetch['id'];
$data['ports'][$i]['value']=$latest_fetch['ports_name'];
$data['ports'][$i]['code']=$latest_fetch['ports_code'];
$i++;			 	
}

}	
else	
{	

$data['isSuccess']="0";
$data['message']="Data Not Fetched";

}

echo html_entity_decode(json_encode($data));

/*echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body>'; print_r($data);echo '</body></html>';*/
?>