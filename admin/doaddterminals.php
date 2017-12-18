<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$terminalName = $_REQUEST['terminalName'];
$status = $_REQUEST['status'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$terminal_sql = "Insert into terminals (terminals_name, terminals_status, created_by, modified_by, created_at, updated_at )
values('$terminalName','$status','$username','$username','$date','$date') ";
$terminal_exe = mysql_query($terminal_sql);
header("Location: terminalslist.php?suc=1");

?>