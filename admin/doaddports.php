<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$portName = $_REQUEST['portName'];
$status = $_REQUEST['status'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$port_sql = "Insert into ports (ports_name, ports_status, created_by, modified_by, created_at, updated_at )
values('$portName','$status','$username','$username','$date','$date') ";
$port_exe = mysql_query($port_sql);
header("Location: portslist.php?suc=1");

?>