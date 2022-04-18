<?php


class ClasesModel{
    private $db;

    public function __construct($data){
      $this->db = new Database;
      $this->course = ($data != null) ?  new Clases($data) : "";
    }

    public function register(){
        try{
            $this->db->beginTransaction();
            $this->db->query("SELECT * FROM schedule ORDER BY id_schedule DESC");
            $this->db->execute();
            $schedule = $this->db->single();
            $schedule_id = ($schedule) ? $schedule->id_schedule + 1 : 1;

            $this->db->query('INSERT INTO class(name, color, id_teacher, id_course, id_schedule) VALUES(:name, :color, :id_teacher, :id_course, :id_schedule)');
            $this->db->bind(':name', $this->course->name);
            $this->db->bind(':color', $this->course->color);
            $this->db->bind(':id_teacher', intval($this->course->id_teacher));
            $this->db->bind(':id_course', intval($this->course->id_course));
            $this->db->bind(':id_schedule', $schedule_id);
            $this->db->execute();
            $classID = $this->db->lastInsertId();

            $this->db->query('INSERT INTO schedule(id_class, time_start, time_end, day) VALUES(:id_class, :time_start, :time_end, :day)');
            $this->db->bind(':id_class', intval($classID));
            $this->db->bind(':time_start', $this->course->time_start);
            $this->db->bind(':time_end', $this->course->time_end);
            $this->db->bind(':day', $this->course->day);
            $this->db->execute();
            $this->db->commit();
        }catch(Exception $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
    }

    public function update(){
        try{
            $this->db->beginTransaction();
            $this->db->query('UPDATE class SET name=:name, color=:color, id_teacher=:id_teacher, id_course=:id_course, id_schedule=:id_schedule WHERE id_class=:id');
            $this->db->bind(':id', $this->course->id_class);
            $this->db->bind(':name', $this->course->name);
            $this->db->bind(':color', $this->course->color);
            $this->db->bind(':id_teacher', intval($this->course->id_teacher));
            $this->db->bind(':id_course', intval($this->course->id_course));
            $this->db->bind(':id_schedule', $this->course->id_schedule);
            $this->db->execute();
            
            $this->db->query('UPDATE schedule SET time_start=:time_start, time_end=:time_end, day=:day WHERE id_schedule=:id_schedule');
            $this->db->bind(':id_schedule', $this->course->id_schedule);
            $this->db->bind(':time_start', $this->course->time_start);
            $this->db->bind(':time_end', $this->course->time_end);
            $this->db->bind(':day', $this->course->day);
            $this->db->execute();
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
    }

    public function getAll(){
        $this->db->query("SELECT co.name AS cursename, ca.name AS classname, t.name AS tname, t.surname AS tsurname, 
                                 sc.day AS day, sc.time_start AS time_start, sc.time_end AS time_end,ca.id_class AS id_class,
                                 co.id_course AS id_course, t.id_teacher AS id_teacher, sc.id_schedule AS id_schedule
                          FROM courses AS co
                          INNER JOIN class AS ca
                          ON co.id_course=ca.id_course
                          INNER JOIN teachers AS t
                          ON ca.id_teacher=t.id_teacher
                          INNER JOIN schedule AS sc
                          ON ca.id_schedule=sc.id_schedule");
        $courses = $this->db->all();
        if($courses){
            return $courses;
        } else {
            return false;
        }
      }

      public function getAllByStudentID($id){

        //NO HACE FALTA ca.id_class AS id_class,co.id_course AS id_course, t.id_teacher AS id_teacher, t.name AS tname, t.surname AS tsurname, sc.id_schedule AS id_schedule
        $this->db->query("SELECT co.name AS cursename, ca.name AS classname, 
                                 sc.day AS day, sc.time_start AS time_start, sc.time_end AS time_end,
                          FROM courses AS co
                          INNER JOIN class AS ca
                          ON co.id_course=ca.id_course
                          INNER JOIN schedule AS sc
                          ON ca.id_schedule=sc.id_schedule
                          JOIN enrollment AS en
                          ON co.id_course=en.id_course
                          WHERE enrollment.id_student=:id
                          
                          ");
        $this->db->bind(':id', $this->course->id_class);
        $courses = $this->db->all();
        if($courses){
            return $courses;
        } else {
            return false;
        }
      }



      public function getClassByID($id){
        $this->db->query("SELECT * FROM class WHERE id_class=:id");
        $this->db->bind(':id', $id);
        $class = $this->db->single();
        if($class){
            return $class;
        } else {
            return false;
        }
      }

      public function getClassByScheduleID($id){
        $this->db->query("SELECT * FROM class AS c
                                   LEFT JOIN schedule AS s
                                   ON c.id_schedule=s.id_schedule 
                                   WHERE c.id_schedule=:id");
        $this->db->bind(':id', $id);
        $course = $this->db->single();
        if($course){
            return $course;
        } else {
            return false;
        }
      }
  
      

      public function delete($id){
        $this->db->query("DELETE FROM class WHERE id_class=:id");
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
      }
}
