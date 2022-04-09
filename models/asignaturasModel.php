<?php
  class AsignaturasModel{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function setCourse($data){
        $this->db->query('INSERT INTO courses(name, description, date_start, date_end, active) VALUES(:name, :description, :date_start, :date_end, :active)');
        $this->db->bind(':name', $data->name);
        $this->db->bind(':description', $data->description);
        $this->db->bind(':date_start', date("Y-m-d", strtotime($data->date_start)));
        $this->db->bind(':date_end', date("Y-m-d", strtotime($data->date_end)));
        $this->db->bind(':active', $data->active);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
            $this->db->error();
        }
    }

}