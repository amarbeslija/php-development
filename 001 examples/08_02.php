<?php

trait user_function{
    public function login(){
        return $this->type . " is logged in!";
    }

    public function register(){
        return $this->type . " is registered!";
    }
}

class User{
    public $type;
    use user_function;

    public function __construct($type){
        $this->type = $type;
    }
}

$user1 = new User("User");
echo $user1->login();

echo "<br><br>";

$user2 = new User("Admin");
echo $user2->login();