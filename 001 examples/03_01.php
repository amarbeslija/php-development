<?php

class Project{
    public $name;
    public $length;
    public $type;

    public function __construct($name, $length, $type){
        $this->name = $name;
        $this->length = $length;
        $this->type = $type;
    }

    public function project_info(){
        return "Name: " . $this->name . "; Length: " . $this->length . "; Type: " . $this->type;
    }
}