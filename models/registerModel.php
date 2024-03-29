<?php
  class RegisterModel {
    private $db;

    public function __construct($data){
      $this->db = new Database;
      $this->user = new User($data);
    }

    public function register(){
        $this->db->query('INSERT INTO students (username,  pass, email, name, surname, telephone, nif, date_registered) VALUES(:username, :pass, :email, :name, :surname, :telephone, :nif, :date_registered)');
        var_dump($this->user);
        $this->db->bind(':username', $this->user->username );
        $this->db->bind(':pass', password_hash($this->user->pass, PASSWORD_DEFAULT));
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

    public function registerAdmin(){
      $this->db->query('INSERT INTO users_admin (username,  password, email, name) VALUES(:username, :pass, :email, :name)');
      var_dump($this->user);
      $this->db->bind(':username', $this->user->username );
      $this->db->bind(':pass', password_hash($this->user->pass, PASSWORD_DEFAULT));
      $this->db->bind(':email', $this->user->email);
      $this->db->bind(':name', $this->user->name);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
          $this->db->error();
      }
    }

    public function userNotExist(){
      $this->db->query("SELECT email FROM students where email= :email"); 
      $this->db->bind(':email', $this->user->email);
      // Execute
      if($this->db->single()){
        return false;
      } else {
        $this->db->query("SELECT email FROM users_admin where email= :email"); 
        $this->db->bind(':email', $this->user->email);
        // Execute
        if($this->db->single()){
          return false;
        } else {
          return true;
        }
      }
    }

    public function update(){
      try{
        $this->db->query('UPDATE students SET username=:username, pass=:pass, email=:email, name=:name, surname=:surname, telephone=:telephone, nif=:nif WHERE id=:id');
        $this->db->bind(':id', intval($_SESSION['user']));
        $this->db->bind(':username', $this->user->username);
        $this->db->bind(':pass', password_hash($this->user->pass, PASSWORD_DEFAULT));
        $this->db->bind(':email', $this->user->email);
        $this->db->bind(':name', $this->user->name);
        $this->db->bind(':surname', $this->user->surname);
        $this->db->bind(':telephone', $this->user->telephone);
        $this->db->bind(':nif', $this->user->nif);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
            $this->db->error();
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
      
    }

    public function updateAdmin(){
      try{
        echo intval($_SESSION['user']);
        $this->db->query('UPDATE users_admin SET username=:username, password=:pass, email=:email, name=:name WHERE id_user_admin=:id');
        $this->db->bind(':id', intval($_SESSION['user']));
        $this->db->bind(':username', $this->user->username);
        $this->db->bind(':pass', password_hash($this->user->pass, PASSWORD_DEFAULT));
        $this->db->bind(':email', $this->user->email);
        $this->db->bind(':name', $this->user->name);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
            $this->db->error();
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
      
    }
  }