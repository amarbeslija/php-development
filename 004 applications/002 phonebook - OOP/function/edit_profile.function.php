<?php

/**
 * 
 * Function for updating user profile info
 * @param array $data with key value pairs that correspond with those in the user table
 * @return string It returns json encoded array 
 */
require "validate_email.function.php";
require "validate_phone.function.php";
function edit_profile($data)
{
    $user = new User();
    //Check db for duplicate phone
    if (isset($data['phone_number'])) {
        $phone_array = [
            "phone_number" => $data['phone_number']
        ];
        $validate_phone = json_decode(validate_phone($phone_array), true);
        if ($validate_phone['valid'] == 0) {
            return json_encode($validate_phone);
        }
    }

    //If is set email in $data array check it in db for duplicate
    if (isset($data['email'])) {
        //Array for validation of email in db
        $email_array = [
            "check_db" => "",
            "email" => $data["email"]
        ];
        if (json_decode(validate_email($email_array), true)["valid"] == 1) {
            if ($execute = $user->change_data($data)) {
                $niz = [
                    'valid' => 1,
                    'msg' => Language::get("toastr", "success")
                ];

                return json_encode($niz);
            } else {
                $niz = [
                    'valid' => 0,
                    'msg' => Language::get("toastr", "error")
                ];

                return json_encode($niz);
            }
        } else {
            $niz = [
                'valid' => 0,
                'msg' => Language::get("toastr", "invalid_email")
            ];

            return json_encode($niz);
        }
    } else {
        if ($execute = $user->change_data($data)) {
            $niz = [
                'valid' => 1,
                'msg' => Language::get("toastr", "success")
            ];

            return json_encode($niz);
        } else {
            $niz = [
                'valid' => 0,
                'msg' => Language::get("toastr", "error")
            ];

            return json_encode($niz);
        }
    }
}
