<?php
function reset_forgotten_password($data){
    $user = new User();
    $currtime = time();

    $data_from_db = $user->get_data($data['id']);
    $time_from_db = strtotime($data_from_db[0]['expires']);
    $timediff = $time_from_db - $currtime;
    $new_password = Security::hash_password($data['password']);

    $update_array = [
        "password" => $new_password
    ];

    if ($data_from_db[0]['validation_code'] == $data['token'] &&  $timediff <= 86400) {
        return $user->change_data($update_array, $data['id']);
    }else{
        return "false";
    }
}
