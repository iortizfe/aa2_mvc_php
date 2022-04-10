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

    public function update(){
      $this->db->query('UPDATE teachers SET email=:email, name=:name, surname=:surname, telephone=:telephone, nif=:nif WHERE id_teacher=:id');
      $this->db->bind(':id', $this->user->id);
      $this->db->bind(':email', $this->user->email);
      $this->db->bind(':name', $this->user->name);
      $this->db->bind(':surname', $this->user->surname);
      $this->db->bind(':telephone', $this->user->telephone);
      $this->db->bind(':nif', $this->user->nif);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return $this->db->error();
      }
    }

    public function delete($id){
      $this->db->query("DELETE FROM teachers WHERE id_teacher=:id");
      $this->db->bind(':id', $id);
      if($this->db->execute()){
          return true;
      } else {
          return false;
      }
    }

    public function getTeacherByID($id){
      $this->db->query("SELECT * FROM teachers WHERE id_teacher=:id");
      $this->db->bind(':id', $id);
      $teacher = $this->db->single();
      if($teacher){
          return $teacher;
      } else {
          return false;
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