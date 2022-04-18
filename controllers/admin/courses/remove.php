<?php
 session_start();
 $route_type = 'admin';
 include '../../../config/config.php'; 
 include '../../../libraries/MiddlewareRoute.php';
 include '../../../libraries/Database.php'; 
 include '../../../models/coursesModel.php';  
 include '../../../functions/removeCourses.php'; 