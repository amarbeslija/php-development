<?php

interface iUser1{
    public function login();
    public function register();
}

interface iUser2{
    public function get();
    public function set();
    public function edit();
}

class UserTemplate implements iUser1, iUser2{
    public $type;

    public function login(){
        return $this->type . " is logged in! <br>";
    }

    public function register(){
        return $this->type . " is registered! <br>";
    }

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

class User extends UserTemplate{
    public function __construct(){
        $this->type = "User";
    }
}


$user = new User();
$reflection = new \ReflectionClass($user);
echo $reflection->getName() . "<br><br>";
echo $reflection->getShortName() . "<br><br>";
var_dump($reflection->getInterfaceNames());
echo "<br><br>";
var_dump($reflection->getMethods());


