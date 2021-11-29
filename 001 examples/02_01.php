<?php

// Define class here

class SomeRegularClass{
    // Define some field inside the class
    public $regular_field;

    // Define constructor and get field value
    public function __construct($regular_field_value){
        // Save field value inside field defined inside the class
        $this->regular_field = $regular_field_value;
    }

    public function some_method(){
        // Do some operations and echo or return values
        echo $this->regular_field;
    }
}

