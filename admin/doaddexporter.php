<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$exporterName = $_REQUEST['exporterName'];
$personName = $_REQUEST['personName'];
$address = $_REQUEST['address'];
$cityId = $_REQUEST['cityId'];
$state = $_REQUEST['state'];
$countryId = $_REQUEST['countryId'];
$pincode = $_REQUEST['pincode'];
$telephone = $_REQUEST['telephone'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$gstin = $_REQUEST['gstin'];
$panNumber = $_REQUEST['panNumber'];
$icecode = $_REQUEST['ieccode'];
$username = $_SESSION['adminusername'];
$date = date("Y-m-d");

$pwdtime = time();
$pwd = md5($pwdtime);

$sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$exporterName','$email','$pwd','0','1','$date','$date')";
$exe = mysql_query($sql);
$last_id = mysql_insert_id();

$s = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 3)";
$e = mysql_query($s);

$insert_exporter_sq1 = "INSERT INTO `exporter_info` (user_id, name_exporter, name_person, address, city, state, country, pincode, telephone, mobile, email, gstin, pan_number, iec_code, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id','$exporterName','$personName','$address','$cityId','$state','$countryId','$pincode','$telephone','$mobile','$email','$gstin','$panNumber','$icecode','$username','$username','$date','$date')";
$insert_exporter_exe = mysql_query($insert_exporter_sq1);

$insert_address_sq1 = "INSERT INTO `exporter_address` (user_id, name, address, city, state, country, pincode,  mobile, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id','$personName','$address','$cityId','$state','$countryId','$pincode','$mobile','$username','$username','$date','$date')";
$insert_address_exe = mysql_query($insert_address_sq1);


if(!empty($last_id)) {
    $actual_link = "http://$_SERVER[HTTP_HOST]/"."activate.php?id=" . $last_id;
    $toEmail = $email;
    $subject = "SSGA - Exporter Registration Activation Email";
    $content = " Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";

    $message="<div style='width:700px;height:800px;background-image:none;background-repeat: no-repeat;'>
						<table width='700' border='0' cellspacing='0' cellpadding='0' style='border:0px solid #BBBBBB'>

							  <tr>
								<p style=''>Hi <strong>$exporterName</strong>,</p>
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

header("Location: exporterlist.php?suc=1");

?>