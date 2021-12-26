<?php

require_once "../configuration.php";

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['id'])){
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['id'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $_POST['id'];

        $user = new User();
        if($user->edit($firstname, $lastname, $email, $phone, $id)){
            $message = Language::get("app", "editing-success");
            header('Location: ' . URL . "/index.php?message=$message");
        }else{
            Errors::show("2");
        }
    }
}