<?php

class User{
    public $type;

    /**
     * Constructor method which needs user type parameter so our class can function properly.
     * There is no return here because this is a constructor method.
     * @param string $type We need to provide user type here!
     * 
     */
    public function __construct($type){
        $this->type = $type;
    }

    /**
     * Method which log in user inside the application.
     * @return string It returns string which says which user logged in!
     */
    public function login(){
        return $this->type ." User is logged in! <br>";
    }

    /**
     * Method which register user inside the application.
     * @return string It returns string which says which user registered!
     */
    public function register(){
        return $this->type . " User is registered! <br>";
    }

    /**
     * Method which change password for the user inside the application.
     * @return string It returns string which says which user changed its password!
     */
    public function change_password(){
        return $this->type . " User changed password! <br>";
    }
}

$user = new User("Admin");
echo $user->register();
echo $user->login();
echo $user->change_password();
