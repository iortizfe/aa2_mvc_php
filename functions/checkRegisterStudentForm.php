
    <?php 
    
    $usernameComment = $nifComment = $telefonoComment = $emailComment = $nameComment = $surnameComment = "";
    $usernameClass = $nifClass = $telefonoClass = $emailClass = $nameClass = $surnameClass = "";
    $check;

    function checkForm($data){
      global $check;
      $check = count($data) - 1;

      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ 0-9]+$/";
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