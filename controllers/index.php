<?php
 session_start();
 $route_type = 'all';
 include './config/config.php'; 
 include './libraries/MiddlewareRoute.php';
 include './views/partials/head.php'; 
 include './views/index.php'; 
