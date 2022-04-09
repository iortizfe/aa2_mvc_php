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
}
