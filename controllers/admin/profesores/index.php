<?php
 session_start();
 $route_type = 'admin';
 include '../../../config/config.php'; 
 include '../../../libraries/MiddlewareRoute.php';
 include '../../../libraries/Database.php'; 
 include '../../../class/TeacherClass.php'; 
 include '../../../models/teachersModel.php';  
 include '../../../functions/checkFormHelperFunctions.php'; 
 include '../../../functions/checkRegisterTeacherForm.php'; 
 include '../../../views/partials/head.php'; 
 include '../../../views/admin/profesores/index.php'; 