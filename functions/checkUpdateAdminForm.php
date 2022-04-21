
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
      $check = 5;

      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ 0-9]+$/";
       
      $check = checkField($data['username'],$nameRegexp);
      $check = checkEmail($data['email']);
      $check = checkField($data['name'],$nameRegexp);
      $check = checkUserPassword($data['password'], $oldpass);
      $check = checkEqual($data['newpassword1'], $data['newpassword2']);
      
      if($check >= 1){
        global $usernameComment;
        global $emailComment;
        global $nameComment;
        global $passwordComment;
        global $newPasswordComment;

        $usernameComment = checkFieldComment($data['username'],$nameRegexp);
        $emailComment = checkEmailComment($data['email']);
        $nameComment = checkFieldComment($data['name'],$nameRegexp);
        $passwordComment = checkUserPasswordComment($data['password'],$oldpass);
        $newPasswordComment = checkEqualComment($data['newpassword1'], $data['newpassword2']);
      }else{
        $data['password'] = $data['newpassword1'];

        $db2 = new RegisterModel($data);
 
        $response = $db2->updateAdmin();
        if($response == true){
          global $user;
          global $success;
          $db = new LoginModel();
          $user = $db->getMe();
          $success = "Perfil actualizado con éxito";
          unset($_POST);
        }
      }
    }
    
    if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['newpassword1']) && isset($_POST['newpassword2'])){
        $data = array(
          'name' => $_POST['name'],
          'surname' => null,
          'username' => $_POST['username'],
          'password' => $_POST['password'],
          'newpassword1' => $_POST['newpassword1'],
          'newpassword2' => $_POST['newpassword2'],
          'nif' => null,
          'telephone' => null,
          'email' => $_POST['email']
        );
        checkform($data);
    }