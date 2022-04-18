
    <?php 
    $nameComment = $dateMinComment = "";
    $check;

    function checkForm($data){
      global $check;
      $check = 2;

      $nameRegexp = "/^[a-zA-Z áéíóúàèòïüÁÀÉÈÍÓÒÚçÇñÑ 0-9]+$/";
       
      $check = checkField($data['name'],$nameRegexp);
      $check = checkMinDate($data['date_start'], $data['date_end']);

      if($check >= 1){
        global $nameComment;
        global $dateMinComment;

        $nameComment     = checkFieldComment($data['name'],$nameRegexp);
        $dateMinComment  =  checkMinDateComment($data['date_start'], $data['date_end']);
        
      }else{
          $db = new CourseModel($data);

            $response = $db->register();
            if($response == true){
                unset($_POST);
                $_POST = array();
                header('Location: '.URLROOT.'controllers/admin/courses/');
            }
      }
    }
    
    if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['date_start']) && isset($_POST['date_end']) && isset($_POST['active'])){
        $data = array(
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'date_start' => $_POST['date_start'],
            'date_end' => $_POST['date_end'],
            'active' => $_POST['active']
        );
        checkform($data);
    }