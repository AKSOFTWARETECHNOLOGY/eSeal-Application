<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
    header("Location: login.php");
}

include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];

if(isset($_REQUEST['addteam']))
{

$personName = $_REQUEST['personName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$username = "User";
$date = date("Y-m-d");
$role = 6;

$joindate=date("Y-m-d");
	if( ($role!="") && ($email!="") && ($password!="") ) {
		if($password!="") {
		$sql="SELECT * FROM `users` WHERE `email`='$email'";
		$exe=mysql_query($sql);
		$num=@mysql_num_rows($exe);
			if($num>0)
				{
                header("Location: add-team-member.php?error=1");

                //header("Location: user-registration.php?err=4&msg=email");
				}
				else
				{
				$password_md=md5($password);
				$insert_user_sql="INSERT INTO `users` (`name`, `email`, `password`, `confirmed`, `delete_status`)
												VALUES ('$personName', '$email', '$password_md', '1', '1')";

                $insert_user_exe=mysql_query($insert_user_sql);
				
				$brancer_id=mysql_insert_id();
				$role_id=$role;
				
				$insert_role_sql="INSERT INTO `role_user` (`user_id`, `role_id`) 
												VALUES ('$brancer_id', '$role_id')";

				$insert_role_exe=mysql_query($insert_role_sql);


                $insert_exporter_sq1 = "INSERT INTO `brancher_info` (user_id, exporter_id, name_person, address, city, state, country, pincode, telephone, mobile, email, created_by, updated_by, created_at, updated_at)
VALUES ('$brancer_id','$user_id','$personName','$address','$cityId','$state','$countryId','$pincode','$telephone','$mobile','$email','$username','$username','$date','$date')";

                $insert_exporter_exe = mysql_query($insert_exporter_sq1);

                /*
                $insert_address_sq1 = "INSERT INTO `exporter_address` (user_id, name, address, city, state, country, pincode,  mobile, created_by, updated_by, created_at, updated_at)
VALUES ('$user_id','$personName','$address','$cityId','$state','$countryId','$pincode','$mobile','$username','$username','$date','$date')";

                $insert_address_exe = mysql_query($insert_address_sq1);
                */

                /*
				if(!empty($user_id)) {
					$actual_link = "http://$_SERVER[HTTP_HOST]/"."activate.php?id=" . $user_id;
					$toEmail = $email;
					$subject = "SSGA - User Registration Activation Email";
					$content = " Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
					
					$message="<div style='width:700px;height:800px;background-image:none;background-repeat: no-repeat;'>
						<table width='700' border='0' cellspacing='0' cellpadding='0' style='border:0px solid #BBBBBB'>
							  
							  <tr>
								<p style=''>Hi <strong>$name</strong>,</p>
								<p style='text-align:center'>Welcome to SSGA, Thanks for registered with us.</p>
									<div style='padding: 50px 50px 50px 50px;'>
											$content	
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
                */


				
				//include "doregister-mail.php";
				
				header("Location: add-team-member.php?success=1");
				
				}
		}
		else
		{
		header("Location: add-team-member.php?err=3&msg=pasword");
		} 
	}
	else
	{
	header("Location: add-team-member.php?err=2&msg=all");
	} 
}
else
{
header("Location: add-team-member.php?err=1&msg=all");
} 	
	
?>
                            
						