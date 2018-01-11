<?php session_start();
ob_start();

include "config.php";

if(isset($_SESSION['exporteruserid']))
{
    unset($_SESSION['exporteruserid']);
    unset($_SESSION['exporterusername']);
    unset($_SESSION['exporteruseremail']);
    unset($_SESSION['exporteruserrole']);

    header("Location: index.php?success=1");
}
else
{
    header("Location: index.php?success=1");
}
?>