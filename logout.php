<?php session_start();
ob_start();

include "config.php";

if(isset($_SESSION['nextpubuserid']))
{
unset($_SESSION['nextpubuserid']);
unset($_SESSION['nextpubusername']);
unset($_SESSION['nextpubuseremail']);
unset($_SESSION['nextpubuserrole']);

header("Location: index.php?success=1");
}
else
{
header("Location: index.php?success=1");
}
?>
                            
						