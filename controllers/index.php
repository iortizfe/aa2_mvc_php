<?php
 session_start();
 $route_type = 'public';
 include './libraries/MiddlewareRoute.php';
 include './config/config.php'; 
 include './views/partials/head.php'; 
 include './views/index.php'; 
