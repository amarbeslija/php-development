<?php

trait user_function{
    public function login(){
        return $this->type . " is logged in! <br>";
    }

    public function register(){
        return $this->type . " is registered! <br>";
    }
}

trait user_function2{
    public function get(){
        return $this->type . " data is here! <br>";
    }

    public function set(){
        return $this->type . " data is saved! <br>";
    }

    public function edit(){
        return $this->type . " is edited! <br>";
    }
}

class User{
    public $type;
    use user_function;
    use user_function2;

    public function __construct($type){
        $this->type = $type;
    }
}

$user1 = new User("User");
echo $user1->login();
echo $user1->get();

echo "<br><br>";

$user2 = new User("Admin");
echo $user2->login();
echo $user2->get();