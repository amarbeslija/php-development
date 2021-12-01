<?php

class User{
    public static $language  = "EN";

    public static function set_language($language){
        self::$language = $language;
    }

    public function greeting(){
        switch(self::$language){
            case "EN":
                return "Hello!";
            break;
            case "DE":
                return "Hallo!";
            break;
            default:
                return "Hello!";
            break;
        }
    }
}

User::set_language("DE");

$user1 = new User();
echo $user1->greeting() . "<br>";

$user2 = new User();
echo $user2->greeting() . "<br>";