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
     if(password_verify($password, $row->pass)){
      $_SESSION['user'] = $row->id; 
      $_SESSION['role'] = 'student';
      return true;
     }else{
        $this->db->query('SELECT * FROM users_admin WHERE email = :email');     
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if(password_verify($password, $row->pass)){
          $_SESSION['user'] = $row->id; 
          $_SESSION['role'] = 'admin';
          return true;
        }
     }
    }
  }