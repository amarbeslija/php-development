<?php

function validate_name($data)
{
    if (Validation::fullname($data['check_name'])) {
        $niz = [
            'valid' => 1,
            'msg' => Language::get("toastr", "valid_name")
        ];

        return json_encode($niz);
    }else{
        $niz = [
            'valid' => 0,
            'msg' => Language::get("toastr", "invalid_name")
        ];

        return json_encode($niz);
    }
    
}
