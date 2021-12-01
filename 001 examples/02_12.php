<?php
class User{
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

$user = new User();
var_dump(get_class($user));
echo "<br>";
var_dump(get_class_methods($user));

