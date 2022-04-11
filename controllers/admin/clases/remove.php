<?php
 session_start();
 $route_type = 'admin';
 include '../../../config/config.php'; 
 include '../../../libraries/MiddlewareRoute.php';
 include '../../../libraries/Database.php'; 
 include '../../../models/clasesModel.php';  
 include '../../../functions/removeClases.php'; 