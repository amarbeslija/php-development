<?php

# Top-down code design inside procedural programming

// Define operands and operator
$number1 = 13;
$number2 = 26;
$operator = "+";

calculate($number1, $number2, $operator);

function calculate($number1, $number2, $operator){
    switch($operator){
        case "+":
            echo $number1 + $number2;
        break;
        case "-":
            echo $number1 - $number2;
        break;
        case "*":
            echo $number1 * $number2;
        break;
        case "/":
            echo $number1 / $number2;
        break;
    }
}


echo "<br>";

# Bottom-up code design inside object-oriented programming

// Define class with methods
class Calculate{

    public $number1;
    public $number2;

    public function __construct($number1, $number2){
        $this->number1 = $number1;
        $this->number2 = $number2;
    }

    public function add(){
        echo $this->number1 + $this->number2;
    }

    public function sub(){
        echo $this->number1 - $this->number2;
    }

    public function multi(){
        echo $this->number1 * $this->number2;
    }

    public function div(){
        echo $this->number1 / $this->number2;
    }
}

// Define data, instantiate class and show data
$calculator = new Calculate(13, 26);
$calculator->add();