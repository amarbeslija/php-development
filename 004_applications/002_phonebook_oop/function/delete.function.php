<?php

require_once "../configuration.php";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $user = new User();

    if($user->delete($_POST["id"])){
        $message = Language::get("app", "deleting-success");
        header('Location: ' . URL . "/index.php?message=$message");
    }else{
        Errors::show("3");
    }
}