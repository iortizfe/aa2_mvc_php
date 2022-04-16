<?php
    $db_courses = new CourseModel(null);
    echo $_SESSION['user'];
    $mine_courses = $db_courses->getAllCoursesByStudentID($_SESSION['user']);
    echo var_dump($mine_courses);

    
    