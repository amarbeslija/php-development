<?php

class User{
    public static $status = "1";
    public $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function get_name(){
        return $this->name;
    }

}



$user1 = new User("Bruce");
echo $user1->get_name() . "<br>";
echo $user1::$status . "<br>";

$user2 = new User("Peter");
$user2::$status = "2";
echo $user2->get_name() . "<br>";
echo $user2::$status . "<br>";

$user3 = new User("Klark");
echo $user3->get_name() . "<br>";
echo $user3::$status . "<br>";