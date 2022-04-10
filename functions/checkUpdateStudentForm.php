
    <?php 
    
    $usernameComment = $nifComment = $telefonoComment = $emailComment = $nameComment = $surnameComment = $passwordComment = $newPasswordComment = "";
    $check;
    $success = "";

    $db = new LoginModel();
    $user = $db->getMe();
    $oldpass = (property_exists($user,'password')) ? $user->password : $user->pass;

    function checkForm($data){
      global $check;
      global $oldpass;
      $check = 8;

      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ]+$/";
      $nifRegexp = "/^(\d{8}[a-zA-ZñÑ])$/";
      $telefonoRegexp = "/^([679]{1}\d{8})$/";
       
      $check = checkField($data['username'],$nameRegexp);
      $check = checkEmail($data['email']);
      $check = checkField($data['name'],$nameRegexp);
      $check = checkField($data['surname'],$nameRegexp);
      $check = checkField($data['telephone'],$telefonoRegexp);
      $check = checkDNI($data['nif'],$nifRegexp);
      $check = checkUserPassword($data['password'], $oldpass);
      $check = checkEqual($data['newpassword1'], $data['newpassword2']);
      
      if($check >= 1){
        global $usernameComment;
        global $nifComment;
        global $telefonoComment;
        global $emailComment;
        global $nameComment;
        global $surnameComment;
        global $passwordComment;
        global $newPasswordComment;

        $usernameComment = checkFieldComment($data['username'],$nameRegexp);
        $emailComment = checkEmailComment($data['email']);
        $nameComment = checkFieldComment($data['name'],$nameRegexp);
        $surnameComment = checkFieldComment($data['surname'],$nameRegexp);
        $telefonoComment = checkFieldComment($data['telephone'],$telefonoRegexp);
        $nifComment = checkDNIComment($data['nif'],$nifRegexp);
        $passwordComment = checkUserPasswordComment($data['password'],$oldpass);
        $newPasswordComment = checkEqualComment($data['newpassword1'], $data['newpassword2']);
      }else{
        $data['password'] = $data['newpassword1'];
        echo var_dump($data);
        
        $db2 = new RegisterModel($data);
 
        $response = $db2->update();
        if($response == true){
          global $user;
          global $success;
          $db = new LoginModel();
          $user = $db->getMe();
          $success = "Perfil actualizado con exito";
        }
      }
    }
    
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['nif']) && isset($_POST['telephone']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['newpassword1']) && isset($_POST['newpassword2'])){
        $data = array(
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'newpassword1' => $_POST['newpassword1'],
            'newpassword2' => $_POST['newpassword2'],
            'nif' => $_POST['nif'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email']
        );
        checkform($data);
    }