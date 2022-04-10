<?php
 session_start();
 $route_type = 'admin';
 include '../../../config/config.php'; 
 include '../../../libraries/MiddlewareRoute.php';
 include '../../../libraries/Database.php';  
 include '../../../class/ClasesClass.php'; 
 include '../../../models/teachersModel.php';  
 include '../../../models/coursesModel.php';
 include '../../../models/clasesModel.php'; 
 include '../../../functions/getAllListTeachers.php';
 include '../../../functions/getAllListClases.php';  
 include '../../../functions/checkFormHelperFunctions.php'; 
 include '../../../functions/checkRegisterClasesForm.php'; 
 include '../../../views/partials/head.php'; 
 include '../../../views/admin/clases/insertar.php'; 