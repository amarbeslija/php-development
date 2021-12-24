<?php

class MyClass{
    private static $instance;

    private function __construct(){

    }

    public static function GetInstance(){
        if(!isset(self::$instance)){
            self::$instance = new MyClass();
        }
        return self::$instance;
    }
}

$a = MyClass::GetInstance();
$b = MyClass::GetInstance();
var_dump($a === $b);