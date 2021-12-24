<?php

function validate_pass($data)
{
    if (Validation::password($data['password'])) {
        $niz = [
            'valid' => 1,
            'msg' => Language::get("toastr", "valid_pass")
        ];

        return json_encode($niz);
    } else {
        $niz = [
            'valid' => 0,
            'msg' => Language::get("toastr", "invalid_pass")
        ];

        return json_encode($niz);
    }
}
