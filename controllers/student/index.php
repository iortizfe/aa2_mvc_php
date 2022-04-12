<?php
 session_start();
 $route_type = 'private';
 include '../../config/config.php'; 
 include '../../libraries/MiddlewareRoute.php';
 include '../../libraries/Database.php';  
 include '../../class/CourseClass.php'; 
 include '../../models/coursesModel.php';  
 include '../../functions/getAllListCoursesByStudent.php';  
 include '../../views/partials/head.php'; 
 include '../../views/student/index.php'; 