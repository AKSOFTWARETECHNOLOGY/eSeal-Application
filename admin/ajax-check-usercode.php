<?php
include "config.php";
$support_status = array();
$supportcode=$_REQUEST['userscode'];
$support_sql="SELECT * FROM `support_info` WHERE `support_code`='$supportcode'";
$support_exe=mysql_query($support_sql);
$support_cnt=mysql_num_rows($support_exe);
if($support_cnt==0)
{
    $support_status['status']="1";
    $support_status['supportcode']=$supportcode;
}
else
{
    $support_status['status']="2";
    $support_status['supportcode']=$supportcode;
}
echo html_entity_decode(json_encode($support_status));
?>

