<?php session_start();
ob_start();


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
 
include "config.php";

if(isset($_REQUEST['forgotlogin']))
{
$email=$_REQUEST['email'];
$sql="SELECT * FROM `users` WHERE `email`='$email' AND `confirmed`='1' AND `delete_status`='1'";
$exe=mysql_query($sql);
$num=@mysql_num_rows($exe);
if($num>0)
	{
	
	$user_fetch=@mysql_fetch_array($exe);
	
	$name = $user_fetch['name'];
	$password=generateRandomString();
	
	$password_md5=md5($password);
	
	$update_user_sql="UPDATE `users` SET `password`='$password_md5' WHERE `email`='$email'";
	//echo $update_user_sql; exit;			
	//$update_user_exe=mysql_query($update_user_sql);								
				
	
	if($update_user_exe=mysql_query($update_user_sql)) {
					$actual_link = "http://$_SERVER[HTTP_HOST]/"."login.php";
					$toEmail = $email;
					$subject = "SSGA - Your Password Reset";
					$content = " Click this link to login your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
					
					$message="<div style='width:700px;height:800px;background-image:none;background-repeat: no-repeat;'>
						<table width='700' border='0' cellspacing='0' cellpadding='0' style='border:0px solid #BBBBBB'>
							  
							  <tr>
								<p style=''>Hi <strong>$name</strong>,</p>
								<p style='text-align:center'>Welcome to Nextpub, Thanks for registered with us.</p>
									<div style='padding: 50px 50px 50px 50px;'>
												
												<strong>Email : $email</strong><br /><br />				   
												<strong>Password : $password</strong><br /><br />


									</div>		
								</td>
							  </tr>
							  
							  <tr>
								<td height='100' align='center' valign='top'>
								 <p class='style4'>Thanks</p> 
								 <p class='style4'>SSGA Team</p>
								 </td>
							  </tr>
							</table>
							</div>";	

					
					// To send HTML mail, the Content-type header must be set
					$mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
					$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					// Additional headers
					$mailHeaders .= 'From: SSGA <info@ssgaeseal.com>' . "\r\n";

					if(mail($toEmail, $subject, $message, $mailHeaders)) {
						$message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";	
						//echo $message; exit;
					}
					else
					{
						//exit;
					}
				}				
				
	
	header("Location: forgot-login.php?suc=1");
	//header("Location: index.php");
	}
	else
	{
	header("Location: forgot-login.php?err=2");
	}
}
else
{
header("Location: forgot-login.php?err=1");
}
?>
                            
						