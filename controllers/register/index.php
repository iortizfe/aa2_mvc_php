<?php
 session_start();
 $route_type = 'public';
 include '../../config/config.php'; 
 include '../../libraries/MiddlewareRoute.php';
 include '../../libraries/Database.php'; 
 include '../../class/UserClass.php'; 
 include '../../models/registerModel.php'; 
 include '../../functions/checkFormHelperFunctions.php'; 
 include '../../functions/checkRegisterStudentForm.php'; 
 include '../../views/partials/head.php'; 
 include '../../views/register/index.php'; 