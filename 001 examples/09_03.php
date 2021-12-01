<?php
# File: Language.class.php

namespace ITAcademy;

class Language{

    /**
     * 
     * Static method for getting one piece od data form translation file (from particular section inside it, by the key)
     * @param string $section Name of the section inside the translation file.
     * @param string $key Key to search for inside the section inside the translation file.
     * @return string|bool It returns value found by section|key, false otherwise.
     * 
     */
    public function get($section, $key){

        $language = Cookie::get("lang");

        if(!$language){
            $language = "en";
        }

        if($file = File::get("language", $language, "json", true)){ 
            return $file[$section][$key];
        }

        return false;
    }

}

# File: index.php
$language = new ITAcademy\Language();
$data = $language->get("header", "logo");

