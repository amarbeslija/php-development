<?php

/**
 * TEMPORARY DOCS
 * Don't create quieries here, call database for that
 * User these methods to do native user stuff here
 * 
 */

class User
{
    private $validation;
    private $database;
    private $security;
    private $session;
    private $router;

    public function __construct()
    {
        $this->database = new Database();
        $this->session = new Session();
        $this->router = new Router();
    }

    
    public function get_data($user_id)
    {
        $data_from_db = $this->database->select("user", "*", "id", $user_id)->output();
        return $data_from_db;
    }

    public function insert_data()
    {
    }

    public function change_data($data, $id = "")
    {
        if ($id == "") {
            $execute = $this->database->update("user", array_keys($data), array_values($data), "id", $this->session->get("uid"));
        }else{
            $execute = $this->database->update("user", array_keys($data), array_values($data), "id", $id);
        }

        if ($execute) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_data()
    {
    }

    public function get_data_image(){
        
    }

    public function get_status()
    {
    }

    public function change_status()
    {
    }
}
