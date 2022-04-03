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
		    return $row->id;
     }else{
		    return false;
     }
    }
  }