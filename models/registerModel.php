<?php
  class RegisterModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function register($data){
      $this->db->query('INSERT INTO users (username,  pass, email, name, telephone, nif, date_registered) VALUES(:username, :pass, :email, :name, :telephone, :nif, :date_registered)');

      $this->db->bind(':username', $data['username']);
      $this->db->bind(':pass', $data['pass']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':telephone', $data['telephone']);
      $this->db->bind(':nif', $data['nif']);
	    $this->db->bind(':date_registered', $data['date_registered']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return $this->db->error();
      }
    }
  }