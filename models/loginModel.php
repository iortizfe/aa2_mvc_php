<?php
  class LoginModel{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //login user
    public function login($email, $password){
     $this->db->query('SELECT * FROM students WHERE email = :email');     
     $this->db->bind(':email', $email);
     $row = $this->db->single();
     if($row != ""){
      //  echo var_dump($row);
       if(password_verify($password, $row->pass)){
        $_SESSION['user'] = $row->id; 
        $_SESSION['role'] = 'student';
        return true;
       }else{
        return true;
       }
     }else{
        $this->db->query('SELECT * FROM users_admin WHERE email = :email');     
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if($row != ""){
          if(password_verify($password, $row->password)){
            $_SESSION['user'] = $row->id_user; 
            $_SESSION['role'] = 'admin';
            return true;
           }else{
            return true;
           }
        }else{
          return false;
        }
     }
    }
  }