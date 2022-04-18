<?php
 session_start();
 $route_type = 'student';
 include '../../../config/config.php'; 
 include '../../../libraries/MiddlewareRoute.php';
 include '../../../libraries/Database.php'; 
 include '../../../models/coursesModel.php';  
 include '../../../functions/addStudentToCourse.php'; 