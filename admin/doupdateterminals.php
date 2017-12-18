<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

if(isset($_REQUEST['terminal_id'])) {
    $terminalId = $_REQUEST['terminal_id'];
    $terminalName = $_REQUEST['terminalName'];
    $status = $_REQUEST['status'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `terminals` SET `terminals_name` = '$terminalName', `terminals_status` = '$status',
            `modified_by` = '$username', `updated_at` = '$date'
            WHERE `terminals`.`id` = '$terminalId'";
    $exe = mysql_query($sql);
    header("Location: terminalslist.php?suc=1");
}
else{
    header("Location: terminalslist.php?err=1");
}

?>