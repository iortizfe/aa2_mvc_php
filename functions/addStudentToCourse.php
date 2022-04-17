<?php

    if(isset($_GET['id'])){
        $db_clases = new CourseModel(null);
        $data = array('id_course'=>$_GET['id'], 'id_student'=>$_SESSION['user'], 'status'=>1);
        $response = $db_clases->enrollStudent($data);
    };


    header('Location: '.URLROOT.'controllers/student/miscursos.php');