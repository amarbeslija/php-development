<?php

class File
{

    /**
     * 
     * Method for getting static files like json or txt files.
     * @param string $type Type of file to get. Type coresponds to the folder inside the application (for example: file, cache, etc.)
     * @param string $what Which file to get. We only need name of the file without extensions (for example: index, cache, error, etc.)
     * @param string $extension Default extension is php. If needed we can provide our own extension without the dot (for example: json, txt, php)
     * @param bool $decode By default we don't decode file, but if we need to decode JSON file, we can provide true for this parameter
     * @return array|string|bool It returns content of the file we called (decoded if fourth parameter is true - only for JSON) in form of array or string
     * 
     */
    public static function get($type, $what, $extension = "php", $decode = "")
    {
        $extension = "." . $extension;
        $file = @file_get_contents(APP . "/" . $type . "/" . $what . "." . $type . $extension);

        if ($decode) {
            $file = json_decode($file, true);
        }

        if($file !== false) {
            return $file;
        }

        return $file;
    }

    /**
     * 
     * Method for getting static files like json or txt files from custom path
     * @param string $file Name of the file to get with extension (for example: index.php, something.json, etc.)
     * @param string $path Path to the file. We need to provide path from the root folder (we don't need to include root folder, we have that already inside with APP constant)
     * @param bool $decode By default we don't decode file, but if we need to decode JSON file, we can provide true for this parameter
     * @return array|string|bool It returns content of the file we called (decoded if fourth parameter is true - only for JSON) in form of array or string
     * 
     */
    public static function get_custom($file, $path, $decode = "")
    {
        $file = @file_get_contents(APP . "/" . $path . $file);
        if ($decode) {
            $file = json_decode($file, true);
        }

        if($file !== false) {
            return $file;
        }

        return $file;
    }

    /**
     * 
     * Method to set/save static files like json or txt files.
     * @param string $type Type of file to save. Type coresponds to the folder inside the application (for example: file, cache, etc.)
     * @param string $what Which file to save. We only need name of the file without extensions (for example: index, cache, error, etc.)
     * @param string $content Content of the file to be saved.
     * @param string $extension Default extension is php. If needed we can provide our own extension without the dot (for example: json, txt, php)
     * @param bool $encode By default we don't encode file, but if we need to encode to JSON file, we can provide true for this parameter
     * @return bool It returns true if file is succesfully saved, otherwise it returns false.
     * 
     */
    public static function set($type, $what, $content, $extension = "php", $encode = "")
    {
        $extension = "." . $extension;

        if ($encode) {
            $content = json_encode($content);
        }

        $path = APP . "/" . $type . "/" . $what . "." . $type . $extension;
        if (file_put_contents($path, $content)) {
            return true;
        }

        return false;
    }

    /**
     * 
     * Method to set/save static files like json or txt file in custom file/path.
     * @param string $type Type of file to save. Type coresponds to the folder inside the application (for example: file, cache, etc.)
     * @param string $path Path to the file. We need to provide path from the root folder (we don't need to include root folder, we have that already inside with APP constant)
     * @param string $content Content of the file to be saved.
     * @param bool $encode By default we don't encode file, but if we need to encode to JSON file, we can provide true for this parameter
     * @return bool It returns true if file is succesfully saved, otherwise it returns false.
     * 
     */
    public static function set_custom($file, $path, $content, $encode = "")
    {
        if ($encode) {
            $content = json_encode($content);
        }

        $path = APP . "/" . $path . $file;
        if (file_put_contents($path, $content)) {
            return true;
        }

        return false;
    }

    /**
     * 
     * Method to get dynamic PHP files.
     * @param string $type Type of file to get. Type coresponds to the folder inside the application (for example: page, file, cache, etc.)
     * @param string $what Which file to get. We only need name of the file without extensions (for example: index, cache, error, etc.)
     * @param string $extension Default extension is php. If needed we can provide our own extension without the dot (for example: json, txt, php)
     * @return string It returns content of the file we called. Because we use output buffer, we get already executed PHP file in the FORM of html.
     * 
     */
    public static function require($type, $what, $extension = "php")
    {
        $extension = "." . $extension;
        ob_start();

        require APP . "/" . $type . "/" . $what . "." . $type . $extension;
        $content = ob_get_contents();

        ob_clean();

        return $content;
    }
}