<?php

// Function car which will take in three parameters and output simple list
function car_function($car_name, $car_color, $car_year){
    echo "<ul>";
        echo "<li>Car name: " . $car_name . "</li>";
        echo "<li>Car color: " . $car_color . "</li>";
        echo "<li>Car year: " . $car_year . "</li>";
    echo "</ul>";
}

// Class Car which takes in three parameters and output simple list
class Car{
    public $car_name;
    public $car_color;
    public $car_year;

    public function __construct($car_name, $car_color, $car_year){
        $this->car_name = $car_name;
        $this->car_color = $car_color;
        $this->car_year = $car_year;
    }

    public function show(){
        echo "<ul>";
            echo "<li>Car name: " . $this->car_name . "</li>";
            echo "<li>Car color: " . $this->car_color . "</li>";
            echo "<li>Car year: " . $this->car_year . "</li>";
        echo "</ul>";
    }
}

// Call function to execute
car_function("Audi", "A8", "2015");
echo "<br>";

// Call class to execute
$car = new Car("Audi", "A8", "2015");
$car->show();