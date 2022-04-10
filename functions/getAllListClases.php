<?php
    $db_teachers = new TeacherModel(null);
    $teachers = $db_teachers->getAll();

    $db_courses = new CourseModel(null);
    $courses = $db_courses->getAll();

    