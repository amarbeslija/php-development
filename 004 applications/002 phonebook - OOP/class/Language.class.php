<?php

class Language{

    /**
     * 
     * Static method for getting one piece od data form translation file (from particular section inside it, by the key)
     * @param string $section Name of the section inside the translation file.
     * @param string $key Key to search for inside the section inside the translation file.
     * @return string|bool It returns value found by section|key, false otherwise.
     * 
     */
    public static function get($section, $key){

        $language = Cookie::get("lang");

        if(!$language){
            $language = "en";
        }

        if($file = File::get("language", $language, "json", true)){ 
            return $file[$section][$key];
        }

        return false;
    }


    
    /**
     * 
     * Static method for getting whole translation file in form of json string (not array).
     * This is useful for getting whole translation file and saving in on the frontend (local storage for example) so we can have translations on the frontend of the application.
     * @return string It return whole translation file in the form of json string.
     * 
     */
    public static function get_all(){
        $language = Cookie::get("lang");

        if(!$language){
            $language = "en";
        }

        if($file = File::get("language", $language, "json")){
            return $file;
        }

        return false;
    }


    /**
     * Method for setting the whole language file
     * DO IT LATER
     */
    public static function set($name, $content){

    }

    /**
     * Method for deleting the whole language file
     * DO IT LATER
     */
    public static function delete(){

    }

}


/* CLASS TESTING */

#require '../configuration.php';
#var_dump(Language::get("email", "welcome-title"));
#var_dump(Language::get_all());



/**
 * NOTES
 * @status IN PROGRESS
 * @add_later ADD CALLING CACHED FILES
 */