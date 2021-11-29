<?php

class Cookie{

    // Static method for getting cookies
    public static function get($cookie){

        if(isset($_COOKIE[$cookie])){
            return $_COOKIE[$cookie];
        }

        return false;
    }

    // Static method for setting cookies
    public static function set($name, $value, $time = "year", $path = "", $domain = ""){

        switch($time){
            case "year":
                $time = time() + ( 365 * 24 * 60 * 60);
            break;
            case "month":
                $time = time() + ( 31 * 24 * 60 * 60);
            break;
            case "day":
                $time = time() + (24 * 60 * 60);
            break;
            case "hour":
                $time = time() + (60 * 60);
            break;
        }


        if(setcookie($name, $value, $time, $path, $domain)){
            return true;
        }

        return false;
    }

    // Static method for deleting cookies
    public static function delete($cookie){

        if(setcookie($cookie, "", time() - 3600)){
            return true;
        }
        
        return false;
    }
}

// Usage example of static methods
Cookie::get("some_cookie");
Cookie::set("some_cookie", "some_value");
Cookie::delete("some_cookie");