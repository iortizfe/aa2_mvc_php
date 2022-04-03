<?php

$error = "Hola";

if(isset($_POST['email']) && isset($_POST['password'])){
    $db = new LoginModel();
    $userId = $db->login($_POST['email'], $_POST['password']);
    if($userId){ 
        $_SESSION['user'] = $userId; 
        header('Location: '.URLROOT.'/');
    }else{
        global $error;
        $error = "El usuario no existe por favor registrate";
    }
}