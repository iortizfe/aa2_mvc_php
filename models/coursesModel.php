<?php
  class CourseModel{
    private $db;

    public function __construct($data){
      $this->db = new Database;
      $this->course = ($data != null) ?  new Course($data) : "";
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

    public function update($id){
      $this->db->query('UPDATE courses SET name=:name, description=:description, date_start=:date_start, date_end=:date_end, active=:active WHERE id_course=:id');
      $this->db->bind(':id', $id);
      $this->db->bind(':name', $this->course->name);
      $this->db->bind(':description', $this->course->description);
      $this->db->bind(':date_start', date("Y-m-d", strtotime($this->course->date_start)));
      $this->db->bind(':date_end', date("Y-m-d", strtotime($this->course->date_end)));
      $this->db->bind(':active', $this->course->active);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return $this->db->error();
      }
    }

    public function delete($id){
      $this->db->query("DELETE FROM courses WHERE id_course=:id");
      $this->db->bind(':id', $id);
      if($this->db->execute()){
          return true;
      } else {
          return false;
      }
    }


    public function getCourseByID($id){
      $this->db->query("SELECT * FROM courses 
                      WHERE id_course=:id");
      $this->db->bind(':id', $id);
      $course = $this->db->single();
      if($course){
          return $course;
      } else {
          return false;
      }
    }

    public function getAllCoursesByStudentID($id){
      $this->db->query("SELECT * 
                        FROM enrollment AS e
                        RIGHT JOIN courses AS c
                        ON e.id_course=c.id_course
                        AND e.id_student=:id");
      $this->db->bind(':id', $id);
      $courses = $this->db->all();
      if($courses){
          return $courses;
      } else {
          return false;
      }
    }

  public function getAll(){
    $this->db->query("SELECT * FROM courses ORDER BY name ASC");
    // Execute
    if($this->db->execute()){
      return $this->db->all();
    } else {
        $this->db->error();
    }
  }

  public function getCourseDatesById($id){
    $this->db->query("SELECT date_start, date_end FROM courses WHERE id_course = $id");
    // Execute
    if($this->db->execute()){
      return $this->db->single();
    } else {
        $this->db->error();
    }
  }
}