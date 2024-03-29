
    <?php 
    
    $nifComment = $telefonoComment = $emailComment = $nameComment = $surnameComment = "";
    $nifClass = $telefonoClass = $emailClass = $nameClass = $surnameClass = "";
    $check;
    $success = "";
    $teacher;

    if(isset($_GET['id'])){
      $db = new TeacherModel(null);
      $teacher = $db->getTeacherByID($_GET['id']);
    }else{
      header('Location: '.URLROOT.'controllers/admin/teachers/');
    };

    function checkForm($data){
      global $check;
      $check = count($data) - 1;

      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ 0-9]+$/";
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
          $response = $db->update($data['id']);
          if($response == true){
            global $success;
            $success = "Perfil actualizado con éxito";
            //header('Location: '.URLROOT.'controllers/admin/teachers/');
          }
      }
    }

    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['nif']) && isset($_POST['telephone']) && isset($_POST['email'])){
        $data = array(
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'nif' => $_POST['nif'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email']
        );
        checkform($data);
    }