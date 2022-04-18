<?php

    if(isset($_GET['id'])){
        $db = new TeacherModel(null);
        $response = $db->delete($_GET['id']);
    };

    header('Location: '.URLROOT.'controllers/admin/teachers/');