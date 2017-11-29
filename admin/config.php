<?php error_reporting(0);

	$server		=	"localhost";
	$user		=	"root";
	$password	=	"";
	$dbname		=	"nextpub";
	
	$connection	=	mysql_connect($server,$user,$password) or die("not Server not connected");
	$database	=	mysql_select_db($dbname) or die("Data base not connected");
?>
                            
						