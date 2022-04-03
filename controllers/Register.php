<?php
 session_start();
 $route_type = "public";
 include '../libraries/MiddlewareRoute.php';
 include '../config/config.php'; 
 include '../libraries/Database.php'; 
 include '../modules/UserClass.php'; 
 include '../models/registerModel.php'; 
 include '../functions/checkRegisterStudentForm.php'; 
 include '../views/partials/head.php'; 
 include '../views/register/index.php'; 