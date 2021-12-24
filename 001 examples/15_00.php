<?php
class Sum{ 

var $number1; 
var $number2; 
var $total; 

public function input($num1,$num2){ 
    $this->number1=$num1; 
    $this->number2=$num2; 
} 

public function calculate(){ 
    $this->total = $this->number1+$this->number2; 
} 

public function render(){ 
    echo "The result is: " . $this->total; 
} 

} 



$result = new Sum; 
$result->input($_GET['a'],$_GET['b']); 
$result->calculate(); 
$result->render();