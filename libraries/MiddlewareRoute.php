<?php
if (!isset($_SESSION['user']) && $route_type == "private") {
    header('Location: '.URLROOT.'/controllers/Login.php');
}