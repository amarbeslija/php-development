<?php
require "check_pass_in_db.function.php";
require "validate_pass.function.php";
/**
 * 
 * Function for updating user password
 * @param array $data array with an old password and a new one
 * @return string It returns json encoded array 
 */
function change_password($data)
{
    $user = new User();
    $database = new Database();
    $session = new Session();

    $array = [
        "password" => $data['password']
    ];
    $arr = [
        "password" => $data['new_password']
    ];
    //Check if this password is in DB with this user
    $check_db = json_decode(check_pass_in_db($array), true);
    //Validate format of new password
    $validate_new_password = json_decode(validate_pass($arr), true);
    //Get data of a user from database
    $data_from_db = $database->select("user", ["password", "email"], "id", $session->get("uid"))->output();

    if ($check_db['valid'] == 1 &&  $validate_new_password['valid'] == 1) {
        $hash_new_pass = Security::hash_password($data['new_password']);
        $array = [
            "password" => $hash_new_pass
        ];

        if ($user->change_data($array) == true) {
            $email = new Email($data_from_db[0]['email'], "change_password_email", "");
            $email->send();

            $niz = [
                "valid" => 1,
                "msg" => Language::get("toastr", "pass_success")
            ];
            return json_encode($niz);
        } else {
            $niz = [
                "valid" => 0,
                "msg" => Language::get("toastr", "pass_error")
            ];
            return json_encode($niz);
        }
    }
}
