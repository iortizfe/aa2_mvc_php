<?php
 session_start();
 $route_type = 'not-private';
 include '../config/config.php';
 include '../libraries/MiddlewareRoute.php';
 include '../libraries/Database.php';
 include '../models/loginModel.php';
 include '../functions/setLoginUserForm.php';
 include '../views/partials/head.php';
 include '../views/login/index.php';