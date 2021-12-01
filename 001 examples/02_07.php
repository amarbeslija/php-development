<?php

interface login{
    public function login();
}

interface register{
    public function register();
}

class User implements login, register{
    public function login(){
        echo "User is logged in! <br>";
    }

    public function register(){
        echo "User is registered! <br>";
    }
}

$user = new User();
$user->register();
$user->login();