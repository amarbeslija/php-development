<?php

class Project{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    private function build_name(){
        return "This name is " . $this->name;
    }

    public function get_name(){
        return $this->build_name();
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