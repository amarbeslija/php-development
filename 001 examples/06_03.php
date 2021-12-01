<?php

interface iCar{
    public function turn_on();
    public function turn_off();
    public function drive();
    public function stop();
}

class Car{
    public $manifacturer;
    public $door_number;
    public $wheel_size;
    public $color;
}

class Audi extends Car implements iCar{
    public $light_type;

    public function __construct($manifacturer, $door_number, $wheel_size, $color, $light_type){
        $this->manifacturer = $manifacturer;
        $this->door_number = $door_number;
        $this->wheel_size = $wheel_size;
        $this->color = $color;
        $this->light_type = $light_type;
    }

    public function turn_on(){
        return "Audi is turned on!";
    }

    public function turn_off(){
        return "Audi is turned off!";
    }

    public function drive(){
        return "Audi is driving!";
    }

    public function stop(){
        return "Audi has stopped!";
    }
}

class Mercedes extends Car implements iCar{
    public $radio_type;

    public function __construct($manifacturer, $door_number, $wheel_size, $color, $radio_type){
        $this->manifacturer = $manifacturer;
        $this->door_number = $door_number;
        $this->wheel_size = $wheel_size;
        $this->color = $color;
        $this->radio_type = $radio_type;
    }

    public function turn_on(){
        return "Mercedes is turned on!";
    }

    public function turn_off(){
        return "Mercedes is turned off!";
    }

    public function drive(){
        return "Mercedes is driving!";
    }

    public function stop(){
        return "Mercedes has stopped!";
    }
}
