<?php

class User {

    protected function get_fullname() {
        return "It is working!";
    }

    public function __get($method){
        $method = 'get_' . $method;

        if (method_exists($this, $method)){
            return $this->{$method}();
        }else{
            return "It doesn't exists!";
        }
    }
}

$user = new User();
var_dump($user->fullname);
echo "<br><br>";
var_dump($user->some_other_method);