<?php

abstract class User{
    abstract public function sayHello();
}

class English extends User{
    public function sayHello(){
        echo "Hello! <br>";
    }
}

class German extends User{
    public function sayHello(){
        echo "Hallo! <br>";
    }
}

$english = new English();
$english->sayHello();

$german = new German();
$german->sayHello();