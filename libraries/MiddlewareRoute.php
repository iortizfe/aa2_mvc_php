<?php
if (!isset($_SESSION['user']) && $route_type == "private") {
    header('Location: '.URLROOT.'controllers/login.php');
}else if(isset($_SESSION['user']) && $route_type == "not-private") {
    header('Location: '.URLROOT.'/');
}else if(isset($_SESSION['user']) && $_SESSION['role'] != 'admin' && $route_type == "admin") {
    header('Location: '.URLROOT.'/');
}