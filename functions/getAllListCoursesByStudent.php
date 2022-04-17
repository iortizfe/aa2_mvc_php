<?php
    $db_courses = new CourseModel(null);
    $mine_courses = $db_courses->getAllCoursesByStudentID($_SESSION['user']);

    
    