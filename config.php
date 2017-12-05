<?php error_reporting(0);

$hostname		=	"localhost";
$username		=	"root";
$password	    =	"";
$database		=	"eseal_app";
	/*
	$connection	=	mysql_connect($hostname,$username,$password) or die("not Server not connected");
	$database	=	mysql_select_db($database) or die("Data base not connected");
	*/
	
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
?>
                            
						