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

if(isset($_REQUEST['register']))
{
$role=$_REQUEST['role'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$confirmpassword=$_REQUEST['confirmpassword'];
$telephone=$_REQUEST['mobile'];
$city=$_REQUEST['city'];
$joindate=date("Y-m-d");
	if( ($role!="") &&  ($name!="") && ($email!="") && ($password!="") ) {
		if($password==$confirmpassword) {
		$sql="SELECT * FROM `users` WHERE `email`='$email'";
		$exe=mysql_query($sql);
		$num=@mysql_num_rows($exe);
			if($num>0)
				{
				header("Location: register.php?err=4&msg=email");
				}
				else
				{
				$password_md=md5($password);
				$insert_user_sql="INSERT INTO `users` (`name`, `email`, `password`, `confirmed`) 
												VALUES ('$name', '$email', '$password_md', '0')";
				
				$insert_user_exe=mysql_query($insert_user_sql);								
				
				$user_id=mysql_insert_id();
				$role_id=$role;
				
				$insert_role_sql="INSERT INTO `role_user` (`user_id`, `role_id`) 
												VALUES ('$user_id', '$role_id')";
				
				$insert_role_exe=mysql_query($insert_role_sql);								
				
				if($role_id==2)
				{
				$insert_writer_sql="INSERT INTO `writer` (`user_id`, `name`, `email`, `country`, `city`, `telephone`) 
											VALUES ('$user_id', '$name', '$email', '99', '$city', '$telephone')";
				
				$insert_writer_exe=mysql_query($insert_writer_sql);								
				
				}
				
				
				if($role_id==7)
				{
				$insert_publisher_sql="INSERT INTO `publisher` (`user_id`, `name`, `email`, `country`, `city`, `telephone`) 
											VALUES ('$user_id', '$name', '$email', '99', '$city', '$telephone')";
				
				$insert_publisher_exe=mysql_query($insert_publisher_sql);								
				
				}
				


				if(!empty($user_id)) {
					$actual_link = "http://$_SERVER[HTTP_HOST]/"."activate.php?id=" . $user_id;
					$toEmail = $email;
					$subject = "Nextpub - User Registration Activation Email";
					$content = " Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
					
					$message="<div style='width:700px;height:800px;background-image:none;background-repeat: no-repeat;'>
						<table width='700' border='0' cellspacing='0' cellpadding='0' style='border:0px solid #BBBBBB'>
							  
							  <tr>
								<p style=''>Hi <strong>$name</strong>,</p>
								<p style='text-align:center'>Welcome to Nextpub, Thanks for registered with us.</p>
									<div style='padding: 50px 50px 50px 50px;'>
											$content	
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

					
					// To send HTML mail, the Content-type header must be set
					$mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
					$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					// Additional headers
					$mailHeaders .= 'From: Nextpub <info@nextpub.co.in>' . "\r\n";

					if(mail($toEmail, $subject, $message, $mailHeaders)) {
						$message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";	
						//echo $message; exit;
					}
					else
					{
						//exit;
					}
				}				
				
				//include "doregister-mail.php";
				
				header("Location: register-complete.php?user_id=$user_id&success=1");
				
				}
		}
		else
		{
		header("Location: register.php?err=3&msg=pasword");
		} 
	}
	else
	{
	header("Location: register.php?err=2&msg=all");
	} 
}
else
{
header("Location: register.php?err=1&msg=all");
} 	
	
?>
                            
						