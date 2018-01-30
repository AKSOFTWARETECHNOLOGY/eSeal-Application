<?php
error_reporting(0);
if($_SERVER['SERVER_NAME']=="localhost")
{
$hostname="localhost";
$username="eseal_app";
$password="eseal@2017";
$database="eseal_app";
}
else
{
$hostname="localhost";
$username="eseal_app";
$password="eseal@2017";
$database="eseal_app";
}


$conn = mysqli_connect($hostname, $username, $password, $database);
if( mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
$GLOBALS['conn'] = $conn;

function mysql_query($query) {
    $conn = $GLOBALS['conn'];
    return mysqli_query($conn, $query);
}

function mysql_num_rows($exec) {
    return mysqli_num_rows($exec);
}

function mysql_fetch_array($exec) {
    return mysqli_fetch_array($exec);
}

function mysql_fetch_assoc($exec) {
    return mysqli_fetch_assoc($exec);
}

function mysql_insert_id() {
    $conn = $GLOBALS['conn'];
    return mysqli_insert_id($conn);
}


//$link=mysql_connect($ser, $user, $psw) or die ("Could not connect to the Server.");
//mysql_select_db($db) or die ("Could not select the database.");

mysqli_set_charset('utf8',$conn);
mysql_query('set names utf8');
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
// We'll be allow domain
function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

   // echo "You have CORS!";
}
cors();


// We'll be outputting a JSON
header('Content-type: application/json;');
//header('Content-type: application/json;charset=utf-8');
//header('Content-type: text/html; Charset=utf-8');
?> 