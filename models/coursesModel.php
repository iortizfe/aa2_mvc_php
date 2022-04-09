<?php
  class CourseModel{
    private $db;

    public function __construct($data){
      $this->db = new Database;
      $this->course = new Course($data);
    }

    public function register(){
        $this->db->query('INSERT INTO courses(name, description, date_start, date_end, active) VALUES(:name, :description, :date_start, :date_end, :active)');
        $this->db->bind(':name', $this->course->name);
        $this->db->bind(':description', $this->course->description);
        $this->db->bind(':date_start', date("Y-m-d", strtotime($this->course->date_start)));
        $this->db->bind(':date_end', date("Y-m-d", strtotime($this->course->date_end)));
        $this->db->bind(':active', $this->course->active);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
            $this->db->error();
        }
    }


  //   public function courseNotExist(){
  //     $this->db->query("SELECT name FROM courses where name= :name"); 
  //     $this->db->bind(':email', $this->user->email);
  //     // Execute
  //     if($this->db->single()){
  //         return false;
  //     } else {
  //         return true;
  //     }
  // }
}