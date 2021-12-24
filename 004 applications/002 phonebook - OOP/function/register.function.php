<?php

function register($data){
    $user = new User();

    return $user->register($data['fullname'], $data['email'], $data['password'], $data['password_repeat']);

}