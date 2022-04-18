<?php   

session_start();
include '../config/config.php';
session_destroy();
header('Location: '.URLROOT.'/');
exit();
?>