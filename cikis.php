<?php
ob_start();
session_start();
session_unset();
$_SESSION['FBID'] = NULL;
$_SESSION['FULLNAME'] = NULL;
$_SESSION['EMAIL'] =  NULL;
$_SESSION['login'] = 0;
session_destroy();
header("location:login.php");
?>
