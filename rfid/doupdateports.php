<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

if(isset($_REQUEST['port_id'])) {
    $portId = $_REQUEST['port_id'];
    $portName = $_REQUEST['portName'];
    $status = $_REQUEST['status'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `ports` SET `ports_name` = '$portName', `ports_status` = '$status',
            `modified_by` = '$username', `updated_at` = '$date'
            WHERE `ports`.`id` = '$portId'";
    $exe = mysql_query($sql);
    header("Location: portslist.php?suc=1");
}
else{
    header("Location: portslist.php?err=1");
}

?>