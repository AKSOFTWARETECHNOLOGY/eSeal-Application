<?php
include "config.php";
$id=$_REQUEST['id'];
$useraddress_sql="SELECT * FROM `exporter_address` WHERE `id`='$id'";
$useraddress_exe=mysql_query($useraddress_sql);
$useraddress_exe=mysql_fetch_assoc($useraddress_exe);

echo html_entity_decode(json_encode($useraddress_exe));
?>
                            
						