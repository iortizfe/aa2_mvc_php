<?php
  class registerModel {
    private $db;

    public function __construct($data){
      $this->db = new Database;
      $this->user = new User($data);
    }

    public function register(){
        $this->db->query('INSERT INTO students (username,  pass, email, name, surname, telephone, nif, date_registered) VALUES(:username, :pass, :email, :name, :surname, :telephone, :nif, :date_registered)');
  
        $this->db->bind(':username', $this->user->username );
        $this->db->bind(':pass', $this->user->pass);
        $this->db->bind(':email', $this->user->email);
        $this->db->bind(':name', $this->user->name);
        $this->db->bind(':surname', $this->user->surname);
        $this->db->bind(':telephone', $this->user->telephone);
        $this->db->bind(':nif', $this->user->nif);
        $this->db->bind(':date_registered', date("Y-m-d H:i:s"));
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
            $this->db->error();
        }
    }
  }