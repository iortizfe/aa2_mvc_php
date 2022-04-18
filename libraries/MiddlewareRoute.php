<?php
if (!isset($_SESSION['user']) && ($route_type != "public" && $route_type!="all") ) {
    header('Location: '.URLROOT.'controllers/login.php');
}else if(isset($_SESSION['user']) && $route_type == "public") {
    header('Location: '.URLROOT);
}else if(isset($_SESSION['user']) && $_SESSION['role'] != 'admin' && $route_type == "admin") {
    header('Location: '.URLROOT);
}