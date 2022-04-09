<?php

class User{
    public function __construct($data){
        $this->username         = $data['username'];
        $this->pass             = $data['password'];
        $this->email            = $data['email'];
        $this->name             = $data['name'];
        $this->surname          = $data['surname'];
        $this->telephone        = $data['telephone'];
        $this->nif              = $data['nif'];
    }
}