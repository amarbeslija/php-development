<?php

trait user_methods{
    public function login(){
        echo "User is logged in! <br>";
    }

    public function register(){
        echo "User is registered! <br>";
    }

    public function change_password(){
        echo "User changed password! <br>";
    } 
}

class User{
    use user_methods;
}

$user = new User();
$user->register();
$user->login();
$user->change_password();