<?php
 session_start();
 $route_type = 'admin';
 include '../../../config/config.php'; 
 include '../../../libraries/MiddlewareRoute.php';
 include '../../../libraries/Database.php';  
 include '../../../class/ClassesClass.php'; 
 include '../../../models/asignaturasModel.php';  
 include '../../../functions/checkFormHelperFunctions.php'; 
 include '../../../functions/checkRegisterAsignaturaForm.php'; 
 include '../../../views/partials/head.php'; 
 include '../../../views/admin/asignaturas/index.php'; 