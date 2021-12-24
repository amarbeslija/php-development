<?php
/* CLASS TESTING - AUTOLOADER NEEDS TO BE LOADED PRIOR THE INHERITANCE 
require "../configuration.php";
*/

class Project extends Lab387{
    
    public function __construct(){
        $this->prepare("project");
    }
}

/* CLASS TESTING 

$project = new Project();

var_dump($project->file("status", ""));
*/
