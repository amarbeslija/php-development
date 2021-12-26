<?php

class Validation{

    /**
     * 
     * Static method for validating full name of the user (first name and the last name).
     * @param string $fullname We expect user's full name in the format of the "firstname lastname"
     * @param string $length Opitional parameter where we can increase or decrease the minimal length of the fullname.
     * @return bool It returns true if name is valid, false otherwise.
     * 
     */
    public static function fullname($fullname, $length = 5){
        if (preg_match('/^[A-žÀ-ÿš]+ [A-žÀ-ÿ]+$/', $fullname) > 0 && strlen($fullname) > $length){
            return true;
        }

        return false;
    }

    /**
     * 
     * Method for validating user phone. Checking if number is in number format.
     * @param string $phone We expect user's phone in standard format.
     * @return bool It returns true if valid, false otherwise.
     * 
     */
    public static function phone($phone){
        
        if (preg_match('/^[0-9]+$/', $phone) && strlen($phone) > 5) {
            return true;
        } else {
            return false;
        }
    }
}
