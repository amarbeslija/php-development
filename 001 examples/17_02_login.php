<?php

$usernameDB = "user";
$passwordDB = "1234";

if(isset($_POST['username']) && isset($_POST['password'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username === $usernameDB && $password === $passwordDB){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["logged"] = date("d.m.Y H:i:s");

            header("Location: 17_01_index.php");
        }else{
            header("Location: 17_01_index.php?message=Error!");
        }
    }
}