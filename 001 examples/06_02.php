<?php

class Car{
    public $manifacturer;
    public $door_number;
    public $wheel_size;
    public $color;
}

class Audi extends Car{
    public $light_type;

    public function __construct($manifacturer, $door_number, $wheel_size, $color, $light_type){
        $this->manifacturer = $manifacturer;
        $this->door_number = $door_number;
        $this->wheel_size = $wheel_size;
        $this->color = $color;
        $this->light_type = $light_type;
    }
}

class Mercedes extends Car{
    public $radio_type;

    public function __construct($manifacturer, $door_number, $wheel_size, $color, $radio_type){
        $this->manifacturer = $manifacturer;
        $this->door_number = $door_number;
        $this->wheel_size = $wheel_size;
        $this->color = $color;
        $this->radio_type = $radio_type;
    }
}
