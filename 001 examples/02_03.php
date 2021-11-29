<?php

// Define user class here

class User{

    // Define fields for user's first and last name 
    public $first_name;
    public $last_name;

    // Define field for merging first and last name
    public $full_name;

    // Define constructor to get the data
    public function __construct($first_name, $last_name){
        // Save data inside the class field
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    // Define method for merging user's first and last name
    public function merge(){
        $this->full_name = $this->first_name . " " . $this->last_name;
    }

    // Define method for returning data
    public function output(){
        // Output first and last name to the output
        echo $this->full_name;
    }
}

$user = new User("Peter", "Parker");
$user->merge();
$user->output();

echo "<br>";

$user2 = new User("Bruce", "Wayne");
$user2->merge();
$user2->output();
