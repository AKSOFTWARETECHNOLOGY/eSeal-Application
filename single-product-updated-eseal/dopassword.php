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


if(isset($_REQUEST['passwordupdate']))
{

$currentpassword=$_REQUEST['currentpassword'];
$password=$_REQUEST['password'];
$confirmpassword=$_REQUEST['confirmpassword'];


    $currentpassword_md5=md5($currentpassword);
    $sql="SELECT * FROM `users` WHERE `id`='$user_id' AND `password`='$currentpassword_md5'";
    $exe=mysql_query($sql);
    $num=@mysql_num_rows($exe);
    if($num>0)
    {
        $password_md=md5($password);
        $user_update_sql="UPDATE `users` SET `password`='$password_md' WHERE `id` = $user_id";
        $user_update_exe=mysql_query($user_update_sql);

        header("Location: change-password.php?succ=1&msg=all");
    }
    else
    {
        header("Location: change-password.php?err=1&msg=all");
    }


}
else
{
header("Location: change-password.php?err=2&msg=all");
} 	
	
?>
                            
						