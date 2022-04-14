<?php

    if(isset($_GET['id'])){
        $db_clases = new ClasesModel(null);
        $response = $db_clases->delete($_GET['id']);
    };

    header('Location: '.URLROOT.'controllers/admin/clases/');