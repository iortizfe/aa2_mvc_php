
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


      if($check >= 1){
        global $usernameComment;
        global $emailComment;
        global $nameComment;

        $usernameComment = checkFieldComment($data['username'],$nameRegexp);
        $emailComment = checkEmailComment($data['email']);
        $nameComment = checkFieldComment($data['name'],$nameRegexp);


      }else{
          $db = new RegisterModel($data);
          if($db->adminNotExist()){
            $response = $db->registerAdmin();
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

    
    if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $data = array(
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email']
        );
        checkform($data);
    }