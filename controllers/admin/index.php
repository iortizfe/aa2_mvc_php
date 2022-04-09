<?php
 session_start();
 $route_type = 'admin';
 include '../../config/config.php'; 
 include '../../libraries/MiddlewareRoute.php';
 include '../../libraries/Database.php'; 
//  include '../../class/UserClass.php'; 

include '../../views/partials/head.php'; 
include '../../views/admin/index.php'; 