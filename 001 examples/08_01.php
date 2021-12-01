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

class Admin extends UserTemplate{
    public function __construct(){
        $this->type = "Admin";
    }
}

$user = new User();
echo $user->login();
echo $user->register();
echo $user->set();
echo $user->get();
echo $user->edit();

echo "<br><br>";

$admin = new Admin();
echo $admin->login();
echo $admin->register();
echo $admin->set();
echo $admin->get();
echo $admin->edit();