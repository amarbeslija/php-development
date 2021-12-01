<?php

// Define user class here

class User{

    // Define fields for user's first and last name
    public $first_name;
    public $last_name;

    // Define constructor to get the data
    public function __construct($first_name, $last_name){
        // Save data inside the class field
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    // Define method for returning data
    public function output(){
        // Output first and last name to the output
        echo $this->first_name . " " . $this->last_name;
    }
}

$user = new User("Peter", "Parker");
$user->output();

echo "<br>";

$user2 = new USer("Bruce", "Wayne");
$user2->output();
