
    <?php 
    $nameComment = $dayComment = $timeMinComment = "";
    $check;
    $success ="";
    function checkForm($data){
      global $check;
      $check = 3;

      $db1 = new CourseModel(null);
      $dates = $db1->getCourseDatesById($data['id_course']);

      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ]+$/";
       
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

        echo var_dump($data);
          $db = new ClasesModel($data);
            $response = $db->register();
            if($response == true){
                unset($_POST);
                $_POST = array();
                global $success;
                $success = "Clase insertada con exito";
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
            'id_schedule' => null,
            'id_class' => null,
            'time_start' => $_POST['time_start'],
            'time_end' => $_POST['time_end'],
            'day' => $_POST['day']
        );
        checkform($data);
    }