<?php

class User{
    public function __construct($data){
        $this->username         = $data['username'];
        $this->pass             = $data['pass'];
        $this->email            = $data['email'];
        $this->name             = $data['name'];
        $this->telephone        = $data['telephone'];
        $this->nif              = $data['nif'];
	    $this->date_registered  = $data['date_registered'];

    }
}