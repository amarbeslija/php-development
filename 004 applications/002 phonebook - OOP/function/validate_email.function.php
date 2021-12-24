<?php

function validate_email($data)
{
    $database = new Database();
    $email = $database->select("user", "email", "email", $data['email'])->output();
    if (isset($data['check_db'])) {
        if (Validation::email($data['email']) && $email == null) {
            $niz = [
                'valid' => 1,
                'msg' => Language::get("toastr", "valid_email")
            ];

            return json_encode($niz);
        } else {
            $niz = [
                'valid' => 0,
                'msg' => Language::get("toastr", "invalid_email")
            ];

            return json_encode($niz);
        }
    } else {
        if (Validation::email($data['email'])) {
            $niz = [
                'valid' => 1,
                'msg' => Language::get("toastr", "valid_email")
            ];

            return json_encode($niz);
        } else {
            $niz = [
                'valid' => 0,
                'msg' => Language::get("toastr", "invalid_email")
            ];

            return json_encode($niz);
        }
    }
}
