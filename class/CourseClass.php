<?php

class Course{
    public function __construct($data){
        $this->name             = $data['name'];
        $this->description      = $data['description'];
        $this->date_start       = $data['date_start'];
        $this->date_end         = $data['date_end'];
        $this->active           = $data['active'];
    }
}