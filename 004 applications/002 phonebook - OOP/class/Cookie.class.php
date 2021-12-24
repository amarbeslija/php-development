<?php

class Cookie{

    /**
     * 
     * Static method for getting a cookie from the cookies (frontend).
     * @param string $cookie The name of the cookie we want to retrieve.
     * @return string|bool It return cookie value if cookie is found, false otherwise.
     * 
     */
    public static function get($cookie){

        if(isset($_COOKIE[$cookie])){
            return $_COOKIE[$cookie];
        }

        return false;
    }

    /**
     * 
     * Static method for setting a cookie inside the cookies (frontend).
     * @param string $name The name of the cookie we want to set.
     * @param string $value The value of the cookie we want to set.
     * @param string $time Optional time for how long we want to set the cookie (values are year, month, day, hour).
     * @param string $path Optional path for which want to set the cookie.
     * @param string $domain Optional domain for which we want to set the cookie.
     * @return bool It returns true if the cookie was set, false otherwise.
     * 
     */
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

    /**
     * 
     * Static method for deleting a cookie inside the cookies (frontend).
     * @param string $cookie The name of the cookie to be deleted.
     * @return bool It returns true if the cookie is deleted, false otherwise.
     * 
     */
    public static function delete($cookie){

        if(setcookie($cookie, "", time() - 3600)){
            return true;
        }
        
        return false;
    }
}
