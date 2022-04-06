<?php
if (!isset($_SESSION['user']) && $route_type == "private") {
    header('Location: '.URLROOT.'controllers/Login.php');
}else if(isset($_SESSION['user']) && $route_type == "not-private") {
    header('Location: '.URLROOT.'/');
}