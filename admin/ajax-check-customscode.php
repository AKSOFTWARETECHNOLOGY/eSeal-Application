<?php
include "config.php";
$custom_status = array();
$customscode=$_REQUEST['customscode'];
$customs_sql="SELECT * FROM `customs_info` WHERE `customs_code`='$customscode'";
$customs_exe=mysql_query($customs_sql);
$customs_cnt=mysql_num_rows($customs_exe);
if($customs_cnt==0)
{
    $custom_status['status']="1";
    $custom_status['customscode']=$customscode;
}
else
{
    $custom_status['status']="2";
    $custom_status['customscode']=$customscode;
}
echo html_entity_decode(json_encode($custom_status));
?>

