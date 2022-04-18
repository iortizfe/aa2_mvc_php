<?php

class Teacher{
    public function __construct($data){
        $this->email            = $data['email'];
        $this->name             = $data['name'];
        $this->surname          = $data['surname'];
        $this->telephone        = $data['telephone'];
        $this->nif              = $data['nif'];

    }
}