<?php

    if(isset($_GET['id'])){
        $db_clases = new CourseModel(null);
        $data = array('course_id'=> $_GET['id'], 'student_id'=> $_SESSION['user'], 'active'=> $_GET['state']);
        $response = $db_clases->updateEnrollment($data);
    };

    header('Location: '.URLROOT.'controllers/student/miscursos.php');