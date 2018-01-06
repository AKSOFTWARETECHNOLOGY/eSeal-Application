<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$supportsName = $_REQUEST['usersName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$telephone = $_REQUEST['telephone'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$supportscode = $_REQUEST['userscode'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$pwdtime = time();
$pwd = md5($pwdtime);

$user_sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$supportsName','$email','$pwd','0','1', '$date','$date')";
$user_exe = mysql_query($user_sql);
$last_id = mysql_insert_id();

$role_sql = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 5)";
$role_exe = mysql_query($role_sql);

$insert_support_sq1 = "INSERT INTO `support_info` (user_id, name_support, address, city, state, country, pincode, telephone, mobile, email, support_code, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id','$supportsName','$address','$cityId','$state','$countryId','$pincode','$telephone','$mobile','$email','$supportscode','$username','$username','$date','$date')";
$insert_support_exe = mysql_query($insert_support_sq1);

if(!empty($last_id)) {
    $actual_link = "http://$_SERVER[HTTP_HOST]/"."activate.php?id=" . $last_id;
    $toEmail = $email;
    $subject = "SSGA - User Registration Activation Email";
    $content = " Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";

    $message="<div style='width:700px;height:800px;background-image:none;background-repeat: no-repeat;'>
						<table width='700' border='0' cellspacing='0' cellpadding='0' style='border:0px solid #BBBBBB'>

							  <tr>
								<p style=''>Hi <strong>$supportsName</strong>,</p>
								<p style='text-align:center'>Welcome to SSGA, Thanks for registered with us.</p>
									<div style='padding: 50px 50px 50px 50px;'>
											<strong>Login Details</strong><br/>
									        <p>Email: $email</p>
									        <p>Password: $pwdtime</p>
									        <br/>
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
        $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate your account.";
        //echo $message; exit;
    }
    else
    {
        //exit;
    }
}

header("Location: supporterslist.php?suc=1");

?>