
    <?php 
    
    $usernameComment = $emailComment = $nameComment = "";
    $usernameClass = $emailClass = $nameClass = "";
    $check;

    function checkForm($data){
      global $check;
      $check = count($data) - 1;

      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ 0-9]+$/";
       
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
          if($db->userNotExist()){
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
    
    if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $data = array(
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email']
        );
        checkform($data);
    }