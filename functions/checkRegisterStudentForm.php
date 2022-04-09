
    <?php 
    
    $usernameComment = $nifComment = $telefonoComment = $emailComment = $nameComment = $surnameComment = "";
    $usernameClass = $nifClass = $telefonoClass = $emailClass = $nameClass = $surnameClass = "";
    $check;

    function checkForm($data){
      global $check;
      $check = count($data) - 1;

      $nameRegexp = "/^[a-zA-ZñÑ ]*$/";
      $nifRegexp = "/^(\d{8}[a-zA-ZñÑ])$/";
      $telefonoRegexp = "/^([679]{1}\d{8})$/";
       
      $check = checkField($data['username'],$nameRegexp);
      $check = checkEmail($data['email']);
      $check = checkField($data['name'],$nameRegexp);
      $check = checkField($data['surname'],$nameRegexp);
      $check = checkField($data['telephone'],$telefonoRegexp);
      $check = checkDNI($data['nif'],$nifRegexp);

      if($check >= 1){
        global $usernameComment;
        global $nifComment;
        global $telefonoComment;
        global $emailComment;
        global $nameComment;
        global $surnameComment;

        $usernameComment = checkFieldComment($data['username'],$nameRegexp);
        $emailComment = checkEmailComment($data['email']);
        $nameComment = checkFieldComment($data['name'],$nameRegexp);
        $surnameComment = checkFieldComment($data['surname'],$nameRegexp);
        $telefonoComment = checkFieldComment($data['telephone'],$telefonoRegexp);
        $nifComment = checkDNIComment($data['nif'],$nifRegexp);

      }else{
          $db = new RegisterModel($data);
          if($db->userNotExist()){
            $response = $db->register();
            if($response == true){
                header('Location: '.URLROOT.'controllers/login.php');
            }
          }else{
            global $emailComment;
            $emailComment = "Ya estas registrado. Has utilizado anteriormente este email";
          }
      }
    }

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
    
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['nif']) && isset($_POST['telephone']) && isset($_POST['email']) && isset($_POST['password'])){
        $data = array(
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'nif' => $_POST['nif'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email']
        );
        checkform($data);
    }