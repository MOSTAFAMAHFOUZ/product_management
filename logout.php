<?php 
session_start();
session_unset();
session_destroy();
unset($_SESSION);
header("location:login.php");
exit();
die();