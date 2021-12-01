<?php

class Project{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function get_name(){
        return $this->name;
    }

    public function set_name($value){
        $this->name = $value;
    }
}

$project = new Project("test");
echo $project->get_name();
echo "<br>";

$project->set_name("new_name");
echo $project->get_name();
echo "<br>";