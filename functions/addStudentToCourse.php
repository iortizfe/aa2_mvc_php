<?php

    if(isset($_GET['id'])){
        $db_clases = new ClasesModel(null);
        $data = array('course_id'=>$_GET['id'], 'student_id'=>$_SESSION['user']);
        $response = $db_clases->enrollStudent($data);
    };

    header('Location: '.URLROOT.'controllers/student/miscursos.php');