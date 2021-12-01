<?php

class User{
    public function login(){
        return "User is logged in! <br>";
    }

    public function register(){
        return "User is registered! <br>";
    }

    public function change_password(){
        return "User changed password! <br>";
    }
}

class AdminUser extends User {
    public function login(){
        echo "Admin " . parent::login();
    }

    public function register(){
        echo "Admin " . parent::register();
    }

    public function change_password(){
        echo "Admin " . parent::change_password();
    }
}

class RegularUser extends User{
    public function login(){
        echo "Regular " . parent::login();
    }

    public function register(){
        echo "Regular " . parent::register();
    }

    public function change_password(){
        echo "Regular " . parent::change_password();
    }
}

$administrator = new AdminUser();
$administrator->register();
$administrator->login();
$administrator->change_password();

echo "<hr>";

$user = new RegularUser();
$user->register();
$user->login();
$user->change_password();