<?php
 session_start();
 $route_type = 'admin';
 include '../../../config/config.php'; 
 include '../../../libraries/MiddlewareRoute.php';
 include '../../../libraries/Database.php';  
 include '../../../class/CourseClass.php'; 
 include '../../../models/coursesModel.php';  
 include '../../../functions/checkFormHelperFunctions.php'; 
 include '../../../functions/checkRegisterCourseForm.php'; 
 include '../../../views/partials/head.php'; 
 include '../../../views/admin/courses/insertar.php'; 