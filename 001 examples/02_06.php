<?php

abstract class Car{
    abstract public function hasFourWheels();
}

class Audi extends Car{
    public function hasFourWheels(){
        echo "This Audi has four wheels! <br>";
    }
}

class Fiat extends Car{
    public function hasFourWheels(){
        echo "This Fiat has four wheels! <br>";
    }
}

class Volvo extends Car{
    public function hasFourWheels(){
        echo "This Volvo has four wheels! <br>";
    }
}

$audi = new Audi();
$audi->hasFourWheels();

$fiat = new Fiat();
$fiat->hasFourWheels();

$volvo = new Volvo();
$volvo->hasFourWheels();