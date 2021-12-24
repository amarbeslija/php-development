<?php

class Errors{

    /**
     * 
     * Static method for getting error message from translation file.
     * @param string $error_number We get error by error number inside translation file.
     * @return string|bool It returns error message on success, false otherwise.
     * 
     */
    public static function get($error_number){
        $error_message = Language::get("error", $error_number);
        if(!empty($error_message)){
            return $error_message;
        }

        return false;
    }



    /**
     * 
     * Static method for showing error page if needed (with redirection to the error page.
     * @param string $error_number We get error by error number inside translation file.
     * @return sbool It returns false on failure, or it redirects to the Error page on success.
     * 
     */
    public static function show($error_number){
        $error_message = Language::get("error", $error_number);
        if(!empty($error_message)){
            $link = "?error=" . $error_message;
            header("Location: " . URL . "/error" . $link);
        }

        return false;
    }
}
