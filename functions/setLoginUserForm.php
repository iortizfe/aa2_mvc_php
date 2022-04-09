<?php

$error = "";

if(isset($_POST['email']) && isset($_POST['password'])){
    $db = new LoginModel();
    $exist = $db->login($_POST['email'], $_POST['password']);
    if($exist){ 
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 'student'){
                header('Location: '.URLROOT.'');
            }else if($_SESSION['role'] == 'admin'){
                header('Location: '.URLROOT.'admin');         
            }
        }else{
            global $error;
            $error = "Contraseña Incorrecta";
        }
    }else{
        global $error;
        $error = "El usuario no existe por favor registrate";
    }
}