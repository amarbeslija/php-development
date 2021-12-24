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

    public function register($fullname, $email, $password, $password_confirm)
    {
        $arr = [
            "function" => "validate_email",
            "email" => $email
        ];
        $check_db_email = json_decode($this->router->ajax($arr), true);

        if (Validation::fullname($fullname) && Validation::password($password) && $check_db_email['valid'] == 1 && $password === $password_confirm) {
            $hash_password = Security::hash_password($password);
            $token = Security::hash($email);
            $current_datetime = date("Y-m-d h:i:s");
            $query =  $this->database->insert("user", ["fullname", "email", "validation_code", "password", "datetime"], [$fullname, $email, $token, $hash_password, $current_datetime], true);
            $link = URL. "/get?token=".$token."&id=". $query."&function=activate_user";
            
            $email = new Email($email, "welcome_email", $link);
            if ($email->send() && !empty($query)) {
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public function activate()
    {
    }

    public function login($email, $password)
    {

        //Email and password from database
        /* Treba se dodati poslije jos "status" ali kad se zavrsi mailer radi aktivacije */
        $data_from_db = $this->database->select("user", ["email", "password", "id"], "email", $email)->output();
        $email_from_db = $data_from_db[0]['email'];
        $password_from_db = $data_from_db[0]['password'];

        //Check if they match, if true then login 
        if ($email == $email_from_db && Security::verify_password($password, $password_from_db)) {
            $this->session->add('login', true)
                ->add('status', "1")
                ->add('uid', $data_from_db[0]['id']);

            return true;
        } else {
            return false;
        }
    }

    public function reset_password()
    {
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
