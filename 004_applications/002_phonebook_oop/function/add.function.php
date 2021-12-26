<?php

require_once "../configuration.php";

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone'])){
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['phone'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $user = new User();
        if($user->add($firstname, $lastname, $email, $phone)){
            $message = Language::get("app", "adding-success");
            header('Location: ' . URL . "/index.php?message=$message");
        }else{
            Errors::show("1");
        }
    }
}