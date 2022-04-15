<?php

    $db_clases = new ClasesModel(null);
    $clases = $db_clases->getAllByStudentID($_SESSION['user']);
    echo json_encode($clases);