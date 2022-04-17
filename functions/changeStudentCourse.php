<?php

    if(isset($_GET['id'])){
        $db_clases = new CourseModel(null);
        $data = array('id_enrollment'=> $_GET['id'], 'status'=> $_GET['state']);
        $response = $db_clases->updateEnrollment($data);
    };

    header('Location: '.URLROOT.'controllers/student/miscursos.php');