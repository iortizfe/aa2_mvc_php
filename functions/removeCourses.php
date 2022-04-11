<?php

    if(isset($_GET['id'])){
        $db = new CourseModel(null);
        $response = $db->delete($_GET['id']);
    };

    header('Location: '.URLROOT.'controllers/admin/courses/');