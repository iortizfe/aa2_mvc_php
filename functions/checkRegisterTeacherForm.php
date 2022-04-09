
    <?php 
    
    $usernameComment = $nifComment = $telefonoComment = $emailComment = $nameComment = $surnameComment = "";
    $usernameClass = $nifClass = $telefonoClass = $emailClass = $nameClass = $surnameClass = "";
    $check;

    function checkForm($data){
      global $check;
      $check = count($data);

      $nameRegexp = "/^[a-zA-ZñÑ ]*$/";
      $nifRegexp = "/^(\d{8}[a-zA-ZñÑ])$/";
      $telefonoRegexp = "/^([679]{1}\d{8})$/";
       

      $check = checkEmail($data['email']);
      $check = checkField($data['name'],$nameRegexp);
      $check = checkField($data['surname'],$nameRegexp);
      $check = checkField($data['telephone'],$telefonoRegexp);
      $check = checkDNI($data['nif'],$nifRegexp);

      if($check >= 1){
        global $nifComment;
        global $telefonoComment;
        global $emailComment;
        global $nameComment;
        global $surnameComment;

        $emailComment = checkEmailComment($data['email']);
        $nameComment = checkFieldComment($data['name'],$nameRegexp);
        $surnameComment = checkFieldComment($data['surname'],$nameRegexp);
        $telefonoComment = checkFieldComment($data['telephone'],$telefonoRegexp);
        $nifComment = checkDNIComment($data['nif'],$nifRegexp);

      }else{
          $db = new TeacherModel($data);
          if($db->teacherNotExist()){
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

    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['nif']) && isset($_POST['telephone']) && isset($_POST['email'])){
        $data = array(
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'nif' => $_POST['nif'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email']
        );
        checkform($data);
    }