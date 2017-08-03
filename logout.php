<?php 
$u="";
$p="";
session_start();
unset($_SESSION['sess_user']);
session_destroy();
header("location:login_process.php?user=$u");


?>
