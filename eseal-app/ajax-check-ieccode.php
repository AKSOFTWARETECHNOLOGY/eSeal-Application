<?php
include "config.php";
$user_status = array();
$iec_code=$_REQUEST['icecode'];
$user_sql="SELECT * FROM `exporter_info` WHERE `iec_code`='$iec_code'";
$user_exe=mysql_query($user_sql);
$user_cnt=mysql_num_rows($user_exe);
if($user_cnt==0)
{
    $user_status['status']="1";
    $user_status['icecode']=$iec_code;
}
else
{
    $user_status['status']="2";
    $user_status['icecode']=$iec_code;
}
echo html_entity_decode(json_encode($user_status));
?>
                            
						