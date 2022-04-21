<?php
 session_start();
 $route_type = 'private';
 include '../../config/config.php'; 
 include '../../libraries/MiddlewareRoute.php';
 include '../../libraries/Database.php';  
 include '../../class/ClasesClass.php'; 
 include '../../models/clasesModel.php';  
 include '../../functions/getAllListClasesByStudent.php'; 
 include '../../views/partials/head.php'; 
 include '../../views/student/index.php'; 