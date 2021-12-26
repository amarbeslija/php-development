<?php

require_once "../configuration.php";

if(isset($_POST["search"]) && !empty($_POST["search"])){
    $user = new User();

    if($data = $user->search($_POST["search"])){
        $data = json_encode($data);
        header('Location: ' . URL . "/index.php?data=$data");
    }else{
        Errors::show("4");
    }
}