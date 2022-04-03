<?php
 session_start();
 $route_type = 'public';
 include '../libraries/MiddlewareRoute.php';
 include '../config/config.php';
 include '../libraries/Database.php';
 include '../models/loginModel.php';
 include '../functions/setLoginUserForm.php';
 include '../views/partials/head.php';
 include '../views/login/index.php';