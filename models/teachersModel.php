<?php
  class TeacherModel {
    private $db;

    public function __construct($data){
      $this->db = new Database;
      $this->user = ($data != null) ?  new Teacher($data) : "";
    }

    public function register(){
        $this->db->query('INSERT INTO teachers (email, name, surname, telephone, nif) VALUES(:email, :name, :surname, :telephone, :nif)');
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
      }

    public function teacherNotExist(){
        $this->db->query("SELECT email FROM teachers where email= :email"); 
        $this->db->bind(':email', $this->user->email);
        // Execute
        if($this->db->single()){
            return false;
        } else {
            return true;
        }
    }

    public function getAll(){
      $this->db->query("SELECT * FROM teachers ORDER BY name ASC, surname ASC");
      // Execute
      if($this->db->execute()){
        return $this->db->all();
      } else {
          $this->db->error();
      }
    }
}