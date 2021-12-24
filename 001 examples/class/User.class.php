<?php

class User{
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $status;

    public function __construct($first_name, $last_name, $status){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->status = $status;
    }

    public function full_name(){
        return $this->first_name . " " . $this->last_name;
    }

    public function status(){
        return $this->status;
    }

    public function __destruct(){
        echo "Object is destructed! <br>";
    }
}

$user1 = new User("Peter", "Parker", "1");
echo $user1->full_name();
echo "<br>";

$user2 = clone $user1;
$user2->first_name = "Bruce";
$user2->last_name = "Wayne";

echo $user1->full_name();
echo "<br>";