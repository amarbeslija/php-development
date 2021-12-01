<?php

abstract class iUser{
    public abstract function login($username, $password);
}

class Administrator extends iUser{

    public function login($username, $password){
        $status_from_db = "2";

        if($username == "administrator" && $password == "HeavyPass19!"){
            if($status_from_db == "2"){
                return "Administrator is logged in!";
            }
        }
    }
}

class User extends iUser{

    public function login($username, $password){
        $status_from_db = "1";

        if($username == "user" && $password == "EasyPass!"){
            if($status_from_db == "1"){
                return "User is logged in!";
            }
        }
    }
}

class DifferentUser extends iUser{

    public function login($username, $password){
        // This works even with this wrong logic!
        return "User is logged in!";
    }
}

class OtherUser extends iUser{
    public function login($username, $password){
        // This is not wrong, even if body is empty!
    }
}

$administrator = new Administrator();
echo $administrator->login("administrator", "HeavyPass19!");

echo "<br>";

$user = new User();
echo $user->login("user", "EasyPass!");

echo "<br>";

$different_user = new DifferentUser();
echo $different_user->login("user", "EasyPass!");

echo "<br>";

$other_user = new OtherUser();
echo $other_user->login("user", "EasyPass!");