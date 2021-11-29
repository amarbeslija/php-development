<?php

// Procedural example with many function for a car 
// We don't know which particular car in this case

function start(){
    echo "Car is started! <br>";
}

function move(){
    echo "Car is moving! <br>";
}

function turn_right(){
    echo "Car is turning right! <br>";
}

function stop(){
    echo "Car is stopping! <br>";
}

function turn_off(){
    echo "Car is turned off! <br>";
}

// Call all the functions
start();
move();
turn_right();
move();
stop();
turn_off();

echo "<br><br>";

// Object-oriented example where all methods are defined for particular object (car)
class Car{

    public function start(){
        echo "Car is started! <br>";
    }
    
    public function move(){
        echo "Car is moving! <br>";
    }
    
    public function turn_right(){
        echo "Car is turning right! <br>";
    }
    
    public function stop(){
        echo "Car is stopping! <br>";
    }
    
    public function turn_off(){
        echo "Car is turned off! <br>";
    }
}

// Create a new object (car) and call methods 
// Here we what particular object (car) is doing and we can do that on separate objects (cars)

$audi = new Car();
$audi->start();
$audi->move();
$audi->turn_right();
$audi->move();
$audi->stop();
$audi->turn_off();

echo "<br><br>";

$bmw = new Car();
$bmw->start();
$bmw->move();
$bmw->turn_right();
$bmw->move();
$bmw->move();
$bmw->turn_right();
$bmw->stop();
$bmw->turn_off();