<?php
namespace ITAcademy;

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

// If called in the same file where class is created we don't need to add namespace when we are instantiating class
// If called in other file, we then need to call class like this "$user = new ITAcademy\User();"
$user = new User();
$user->register();
$user->login();
$user->change_password();
