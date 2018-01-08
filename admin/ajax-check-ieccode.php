<?php
include "config.php";
$exporter_status = array();
$ieccode=$_REQUEST['ieccode'];
$exporter_sql="SELECT * FROM `exporter_info` WHERE `iec_code`='$ieccode'";
$exporter_exe=mysql_query($exporter_sql);
$exporte_cnt=mysql_num_rows($exporter_exe);
if($exporte_cnt==0)
{
    $exporter_status['status']="1";
    $exporter_status['ieccode']=$ieccode;
}
else
{
    $exporter_status['status']="2";
    $exporter_status['ieccode']=$ieccode;
}
echo html_entity_decode(json_encode($exporter_status));
?>

