
    <?php 
    $nameComment = $dayComment = $timeMinComment = "";
    $check;
    $success ="";
    if(isset($_GET['id'])){
      $db = new ClasesModel(null);
      $clase = $db->getClassByScheduleID($_GET['id']);
    }else{
      header('Location: '.URLROOT.'controllers/admin/clases/');
    };
    function checkForm($data){
      global $check;
      $check = 3;

      $db1 = new CourseModel(null);
      $dates = $db1->getCourseDatesById($data['id_course']);
      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ 0-9]+$/";
       
      $check = checkField($data['name'],$nameRegexp);
      $check = checkMinDate($data['time_start'], $data['time_end']);
      $check = checkBetweenDate($dates->date_start,$dates->date_end,$data['day']);
     if($check >= 1){
        global $nameComment;
        global $dayComment;
        global $timeMinComment;

        $nameComment      = checkFieldComment($data['name'],$nameRegexp);
        $timeMinComment   = checkMinDateComment($data['time_start'], $data['time_end']);
        $dayComment       = checkBetweenDateComment($dates->date_start,$dates->date_end,$data['day']);
      }else{
          $db = new ClasesModel($data);
            $response = $db->update();
            if($response == true){
              global $success;
              $success = "Curso actualizado con éxito";
              //header('Location: '.URLROOT.'controllers/admin/clases/');
            }
      }
    }
    
    if(isset($_POST['name']) && isset($_POST['color']) && isset($_POST['time_start']) && isset($_POST['time_end']) && isset($_POST['day'])){
        $data = array(
            'name' => $_POST['name'],
            'color' => $_POST['color'],
            'id_teacher' => $_POST['id_teacher'],
            'id_course' => $_POST['id_course'],
            'id_schedule' => $_POST['id_schedule'],
            'id_class' => $_POST['id_class'],
            'time_start' => $_POST['time_start'],
            'time_end' => $_POST['time_end'],
            'day' => $_POST['day']
        );
        checkform($data);
    }