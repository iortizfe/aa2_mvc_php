
    <?php 
    
    $usernameComment = $nifComment = $telefonoComment = $emailComment = $nameComment = "";
    $usernameClass = $nifClass = $telefonoClass = $emailClass = $nameClass = "";

    function checkForm($data){
      $check = 5;
      
      $nameRegexp = "/^[a-zA-ZñÑ ]*$/";
      $nifRegexp = "/^(\d{8}[a-zA-ZñÑ])$/";
      $telefonoRegexp = "/^([679]{1}\d{8})$/";
      $emailRegexp = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
      
      $check = checkField($check,$data['username'],$nameRegexp);
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

        $usernameComment = checkFieldComment($data['username'],$nameRegexp);
        $nameComment = checkFieldComment($data['name'],$nameRegexp);
        $nifComment = checkDNIComment($data['nif'],$nifRegexp);
        $telefonoComment = checkFieldComment($data['telephone'],$telefonoRegexp);
        $emailComment = checkFieldComment($data['email'],$emailRegexp);
  
        $usernameClass = checkFieldClass($data['username'],$nameRegexp);
        $nameClass = checkFieldClass($data['name'],$nameRegexp);
        $nifClass = checkDNIClass($data['nif'],$nifRegexp);
        $telefonoClass = checkFieldClass($data['telephone'],$telefonoRegexp);
        $emailClass = checkFieldClass($data['email'],$emailRegexp);

      }else{
          $db = new RegisterModel;
          $response = $db->register($data);
          if($response == true){
              header('Location: '.APPURL.'/controllers/login');
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

    if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['nif']) && isset($_POST['telephone']) && isset($_POST['email'])){
        $data = array(
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'nif' => $_POST['nif'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email']
        );
        var_dump($data);
        checkform($data);

        echo $usernameComment;
        echo $nameComment;
        echo $nifComment;
        echo $telefonoComment;
        echo $emailComment;
    }