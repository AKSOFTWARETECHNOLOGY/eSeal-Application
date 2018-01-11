<?php
$weblink="http://www.scaleupp.in/";
/* USER WELCOME MAIL */
$to1 = $email;
$subject1="Welcome To Scaleupp";
$weblink1="http://www.scaleupp.in/";


$message1="<div style='width:700px;height:1000px;background-image:url(http://landmark.ind.in/scaleupp/assets/images/mail/mail-user-register.jpg);background-repeat: no-repeat;'>
<table width='700' border='0' cellspacing='0' cellpadding='0' style='border:0px solid #BBBBBB'>
	  
	  <tr>
		<td height='347' align='left' valign='top' style='border-top:0px solid #BBBBBB;border-bottom:0px solid #BBBBBB;padding-top: 450px;'>
		<p style='text-align:center'>Hi <strong>$name</strong>,</p>
		<p style='text-align:center'>You've successfully created your account.we are glad to have you with us</p>
			<div style='padding: 50px 150px 200px 150px;'>
					<strong>Email : $email</strong><br /><br />				   
				    <strong>Password : $password</strong><br />
			</div>		
		</td>
	  </tr>
	  
	  <tr>
		<td height='70' align='center' valign='top'>
		 <p class='style4'>Thanks</p> 
         <p class='style4'>Scaleupp Team</p>
		 </td>
	  </tr>
	</table>
	</div>";	
	$body1 = $message1;
	
	// To send HTML mail, the Content-type header must be set
	$headers1  = 'MIME-Version: 1.0' . "\r\n";
	$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers1 .= 'From: Scaleupp <info@scaleupp.in>' . "\r\n";
	
	//if(mail("test@seniorneedz.com", $subject, $body,$headers)) { echo "YES"; } else { echo "NO"; }
	if(mail($to1, $subject1, $body1, $headers1)) { echo "YES"; } else { echo "NO"; } 
	//echo $body1; exit;
	//@mail($to, $subject, $body,$headers);
/* */	
 
	
/* ADMIN MAIL */	
/*
$subject = "Seniorneedz New Registration";
  $message="<table width='566' border='0' cellspacing='0' cellpadding='0' style='border:1px solid #BBBBBB'>
	  
	  <tr>
		<td height='347' align='left' valign='top' style='border-top:1px solid #BBBBBB;border-bottom:1px solid #BBBBBB'>
		 
		<p>Welcome To Seniorneedz</p>
		<p>The following is your registration information</p>
		 <div align='center'>
           <table border='0' cellspacing='0' cellpadding='0' width='100%'>
             <tr>
               <td align='left'><br />
                    <strong>Name     : $name</strong><br/>
                    <strong>Email    : $email</strong><br />
					<strong>Mobile   : $mobile</strong><br />				   
					<strong>Location : $city</strong><br />				   
             </tr>
           </table>
	      </div>
		  </td>
	  </tr>
	  
	   
	</table>";
	$body =$message;
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'To: Seniorneedz <info@seniorneedz.com>' . "\r\n";
	$headers .= 'From: Seniorneedz <info@seniorneedz.com>' . "\r\n";
	$headers .= 'Cc: operations@seniorneedz.com' . "\r\n";
	$headers .= 'Bcc: test@seniorneedz.com' . "\r\n";
	
    if(mail("info@seniorneedz.com", $subject, $body,$headers)) { echo "YES"; } else { echo "NO"; }
	//@mail("test@seniorneedz.com", $subject, $body,$headers);  
*/	
?>