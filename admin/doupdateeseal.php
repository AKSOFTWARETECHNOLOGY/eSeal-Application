<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$user_role=$_SESSION['adminuserrole'];
$user_name=$_SESSION['adminusername'];
$user_email=$_SESSION['adminuseremail'];

if(isset($_REQUEST['eseal_id'])) {
    $id = $_REQUEST['eseal_id'];
    $userId = $_REQUEST['userId'];
    $iec_no = $_REQUEST['iecCode'];
    $pan_no = $_REQUEST['panNumber'];
    $gst_no = $_REQUEST['gstnum'];
    $sealing_date = $_REQUEST['sealdate'];
    $sealing_time = $_REQUEST['sealtime'];
    $shipping_no = $_REQUEST['billnum'];
    $shipping_date = $_REQUEST['billdate'];
    $trailer_truck_no = $_REQUEST['trucknum'];
    $driver_number = $_REQUEST['drivernumber'];
    $driver_licence = $_REQUEST['driverlicence'];
    $driver_name = $_REQUEST['drivername'];
    $container_size = $_REQUEST['containersize'];
    $container_no = $_REQUEST['containernum'];
    $destination_port = $_REQUEST['destination_port'];
    $terminal_name = $_REQUEST['terminalname'];
    $form_no = $_REQUEST['formno'];
    $eway_no = $_REQUEST['ewayno'];
    $seal_type = $_REQUEST['seal_type'];
    $cfs_reach_time = $_REQUEST['cfsReach'];
    $notes = $_REQUEST['notes'];
    $username = $_SESSION['adminusername'];
    $date = date("Y-m-d");

    $sql = "UPDATE `product_order_info` SET
                                        `iec_no`='$iec_no',`pan_no`='$pan_no',`gst_no`='$gst_no',
                                        `sealing_date`='$sealing_date',`sealing_time`='$sealing_time',
                                        `shipping_no`='$shipping_no',`shipping_date`='$shipping_date',
                                        `trailer_truck_no`='$trailer_truck_no',`driver_number`='$driver_number',
                                        `driver_licence`='$driver_licence',`driver_name`='$driver_name',
                                        `container_size`='$container_size',`container_no`='$container_no',
                                        `destination_port`='$destination_port',`terminal_name`='$terminal_name',
                                        `form_no`='$form_no',`eway_no`='$eway_no',
                                        `seal_type`='$seal_type',`cfs_reach_time`='$cfs_reach_time',
                                        `notes`='$notes'
                                        WHERE `id`='$id'";
    $exe = mysql_query($sql);
    header("Location: eseallist.php?suc=1");
}
else{
    header("Location: eseallist.php?err=1");
}

?>