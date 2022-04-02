
    <?php 
    
    $usernameComment = $nifComment = $telefonoComment = $emailComment = $nameComment = $surnameComment = "";
    $usernameClass = $nifClass = $telefonoClass = $emailClass = $nameClass = $surnameClass = "";

    function checkForm($data){
      $check = count($data);
      
      $nameRegexp = "/^[a-zA-ZñÑ ]*$/";
      $nifRegexp = "/^(\d{8}[a-zA-ZñÑ])$/";
      $telefonoRegexp = "/^([679]{1}\d{8})$/";
      $emailRegexp = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
      
      $check = checkField($check,$data['username'],$nameRegexp);
      $check = checkField($check,$data['surname'],$nameRegexp);
      $check = checkField($check,$data['name'],$nameRegexp);
      $check = checkDNI($check,$data['nif'],$nifRegexp);
      $check = checkField($check,$data['telephone'],$telefonoRegexp);
      $check = checkField($check,$data['email'],$emailRegexp);
      echo $check;

      if($check >= 1){
        global $usernameComment;
        global $nifComment;
        global $telefonoComment;
        global $emailComment;
        global $nameComment;
        global $surnameComment;

        $usernameComment = checkFieldComment($data['username'],$nameRegexp);
        $nameComment = checkFieldComment($data['name'],$nameRegexp);
        $surnameComment = checkFieldComment($data['surname'],$nameRegexp);
        $nifComment = checkDNIComment($data['nif'],$nifRegexp);
        $telefonoComment = checkFieldComment($data['telephone'],$telefonoRegexp);
        $emailComment = checkFieldComment($data['email'],$emailRegexp);
  
        $usernameClass = checkFieldClass($data['username'],$nameRegexp);
        $nameClass = checkFieldClass($data['name'],$nameRegexp);
        $surnameClass = checkFieldClass($data['surname'],$nameRegexp);
        $nifClass = checkDNIClass($data['nif'],$nifRegexp);
        $telefonoClass = checkFieldClass($data['telephone'],$telefonoRegexp);
        $emailClass = checkFieldClass($data['email'],$emailRegexp);

      }else{
          $db = new RegisterModel($data);
          $response = $db->register();
          var_dump($response);
          if($response == true){
              header('Location: '.URLROOT.'/controllers/login');
          }else{
   
          }
      }
    }
    
    function checkField($check,$value,$regex){  
        if(preg_match ($regex,$value)){
            return $check-1;
        }    
    }

    function checkFieldComment($value,$regex){
        if(!preg_match ($regex,$value)){
            return "El valor es incorrecto";
        }else{
            return "";
        }    
    }

    function checkFieldClass($value,$regex){
        if(!preg_match ($regex,$value)){
            return 'incorrecto';
        }else{
            return "correcto";
        }    
    }

    function checkDNI($check,$value,$regex){
        if(preg_match ($regex ,$value)){
            $numero = substr($value,0,strlen($value)-1);
            $letra = substr($value,strlen($value)-1,1);
            $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
            if($letra==$letras[$numero%23]){
                return $check -  1;
            }   
        }
    }

    function checkDNIComment($value,$regex){
        if(preg_match ($regex ,$value)){
            $numero = substr($value,0,strlen($value)-1);
            $letra = substr($value,strlen($value)-1,1);
            $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
            if($letra==$letras[$numero%23]){
                return "";
            }else{
                return "El valor es incorrecto";
            }
        }else{
            return "El valor es incorrecto";
        }   
    }

    function checkDNIClass($value,$regex){
        if(preg_match ($regex ,$value)){
            $numero = substr($value,0,strlen($value)-1);
            $letra = substr($value,strlen($value)-1,1);
            $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
            if($letra==$letras[$numero%23]){
                return 'correcto';
            }else{
                return 'incorrecto';
            }
        }else{
            return 'incorrecto';
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