<?php
    function checkField($value,$regex){  
        global $check;
        return (!preg_match ($regex,$value)) ? $check : $check - 1;
    }

    function checkFieldComment($value,$regex){
        return (!preg_match ($regex,$value)) ? "El valor es incorrecto" : "";
    }

    function checkEmail($value){  
        global $check;
        return (!filter_var($value, FILTER_VALIDATE_EMAIL)) ? $check : $check - 1;
    }

    function checkEmailComment($value){  
        return (!filter_var($value, FILTER_VALIDATE_EMAIL)) ? "El valor es incorrecto" : "";
    }

    function checkDNI($value,$regex){
        global $check;
        if(preg_match($regex,$value)){
            $numero = substr($value,0,strlen($value)-1);
            $letra = substr($value,strlen($value)-1,1);
            $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
            $value = ($letra==$letras[$numero%23]) ? $check - 1: $check;
            return $value;
        }else{
            return $check - 1;
        }
    }

    function checkDNIComment($value,$regex){
        if(preg_match($regex ,$value)){
            $numero = substr($value,0,strlen($value)-1);
            $letra = substr($value,strlen($value)-1,1);
            $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
            return ($letra==$letras[$numero%23]) ? "" : "El valor es incorrecto";
        }else{
            return "El valor es incorrecto";
        }   
    }

    function checkMinDate($min_date, $max_date){
        global $check;
        $min = new DateTime($min_date);
        $max = new DateTime($max_date);
        return ($max < $min) ? $check : $check - 1;
    }

    function checkMinDateComment($min_date, $max_date){
        $min = new DateTime($min_date);
        $max = new DateTime($max_date);
        return ($max < $min) ? "El valor es incorrecto" : "";
    }