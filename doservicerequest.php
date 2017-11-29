<?php session_start();
ob_start();

if(isset($_SESSION['nextpubuserid']))
{
	header("Location: dashboard.php");
}

/*
$_SESSION['scaleuppuser']="1";
header("Location: index.php");
*/
include "config.php";

if(isset($_REQUEST['ServiceSubmit']))
{

$PreferredColour=$_REQUEST['PreferredColour'];
$services=$_REQUEST['services'];
$image=$_REQUEST['ImageInsertions'];

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];
$requestdate=date("Y-m-d");

$requestServices="<br/>";

foreach($services as $serviceValues) {
$requestServices .= $serviceValues."<br/>";
}

$to="alagirivimal@gmail.com";
    $to="zudhire@gmail.com";
$to="navneet.mayank@gmail.com";

$subject="Nextpub Service Request From ".$name;

$message="<div style='width:700px;height:800px;background-image:none;background-repeat: no-repeat;'>
<table width='700' border='0' cellspacing='0' cellpadding='0' style='border:0px solid #BBBBBB'>
	  
	  <tr>
		<p style='text-align:center'>Hi <strong>Admin</strong>,</p>
		<p style='text-align:center'>You Received Service Reqquest From Nextpub</p>
			<div style='padding: 50px 150px 200px 150px;'>
					<strong>Name : $email</strong><br /><br />
					<strong>Email : $email</strong><br /><br />				   
				    <strong>Mobile : $mobile</strong><br /><br />				
					
					<strong>Preferred Colour : $PreferredColour</strong><br /><br />				
					<strong>Services Request : $requestServices</strong><br /><br />				
					<strong>Image Insertions : $image</strong><br /><br />				
					
			</div>		
		</td>
	  </tr>
	  
	  <tr>
		<td height='100' align='center' valign='top'>
		 <p class='style4'>Thanks</p> 
         <p class='style4'>Nextpub Team</p>
		 </td>
	  </tr>
	</table>
	</div>";	
	
	$body = $message;
	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: Nextpub <admin@nextpub.co.in>' . "\r\n";
	
	if(mail($to, $subject, $body, $headers)) { echo "YES"; } else { echo "NO"; } 
	
	header("Location: services.php?suc=1&msg=all");

}
else
{
header("Location: services.php?err=1&msg=all");
} 	
	
?>
                            
						