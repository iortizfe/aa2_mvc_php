<?php
class Clases{
    public function __construct($data){
        $this->name             = $data['name'];
        $this->id_class         = $data['id_class'];
        $this->id_schedule      = $data['id_schedule'];
        $this->id_teacher       = $data['id_teacher'];
        $this->id_course        = $data['id_course'];
        $this->day              = $data['day'];
        $this->time_start       = $data['time_start'];
        $this->time_end         = $data['time_end'];
        $this->color            = $data['color'];
    }
}