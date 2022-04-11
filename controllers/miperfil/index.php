<?php
 session_start();
 $route_type = 'private';
 include '../../config/config.php'; 
 include '../../libraries/MiddlewareRoute.php';
 include '../../libraries/Database.php'; 
 include '../../class/UserClass.php'; 
 include '../../models/loginModel.php'; 
 include '../../models/registerModel.php'; 
 include '../../functions/checkFormHelperFunctions.php'; 
 if(isset($_SESSION['role']) && $_SESSION['role']=="student"){
   include '../../functions/checkUpdateStudentForm.php'; 
   include '../../views/partials/head.php'; 
   include '../../views/miperfil/index.php'; 
 }else if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
   include '../../functions/checkUpdateAdminForm.php'; 
   include '../../views/partials/head.php'; 
   include '../../views/miperfil/admin.php'; 
 }
