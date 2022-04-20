<?php
    $db_clases = new ClasesModel(null);
    
    //$mine_courses = $db_clases->getClassByID($_SESSION['user']);
    
   $mine_clases = $db_clases->getAllByStudentID($_SESSION['user']);
   echo var_dump($mine_clases);
  