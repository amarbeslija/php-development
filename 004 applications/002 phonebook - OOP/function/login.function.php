<?php

function login($data)
{
    $user = new User();

    return $user->login($data['email'], $data['password']);
}
