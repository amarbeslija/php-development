<?php

class Session
{

    /**
     *
     * Method for creating a new session or resuming existing session for the user with no parameters
     * @return none
     * 
     */
    function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     *
     * Method for adding values to the session storage
     * @param string $sesion_name Key for the value stored in the session storage
     * @param string $session_value Value to store in the session storage
     * @return object It returns dynamic object to allow method chaining
     * 
     */
    public function add($session_name, $session_value)
    {
        $_SESSION[$session_name] = $session_value;

        return $this;
    }


    /**
     * 
     * Method for getting value from the session storage
     * @param string $session_name Key for the value stored in the session storage
     * @return string It returns value found in the session storage
     */
    public function get($session_name)
    {

        if ($result = @$_SESSION[$session_name]) {
            return $result;
        }

        return false;
    }

    /**
     * 
     * Method for deleting value from the session storage
     * @param string $session_name Key for the value stored in the session storage
     * @return object It returns dynamic object to allow method chaining
     * 
     */
    public function unset($session_name)
    {
        unset($_SESSION[$session_name]);
        return $this;
    }

    /**
     * 
     * Method for destroying user session
     * @return It returns dynamic object to allow method chaining if needed to start a new session and/or add new values
     * 
     */
    public function destroy()
    {
        session_destroy();

        return $this;
    }

    /**
     * 
     * Static method for getting value from the session storage when don't need to create new session.
     * @param string $session_name Key for the value stored in the session storage
     * @return string It returns value found in the session storage
     */
    public static function get_value($session_name)
    {

        if ($result = @$_SESSION[$session_name]) {
            return $result;
        }

        return false;
    }
}
