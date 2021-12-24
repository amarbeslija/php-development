<?php
/**
 * 
 * Function for sending forgotten password email
 * @param array $data array with a value of a user email
 * @return string It returns true if email is sent or false otherwise
 */
    require APP."/function/validate_email.function.php";
    function forgotten_password($data){
        $check_email_in_db = json_decode(validate_email($data), true);
        $database = new Database();
        $user = new User();

        if ($check_email_in_db['valid'] == 1) {
            //GET data from database
            $data_from_db = $database->select("user", ["validation_code", "id"], "email", $data['email'])->output();
            $link = URL. "/change_password?token=".$data_from_db[0]['validation_code']."&id=". $data_from_db[0]['id'];
            //Update user expire date and time
            $current_datetime = date("Y-m-d h:i:s");
            $arr_update_expire = [
                "expires" => $current_datetime
            ];
            $user->change_data($arr_update_expire, $data_from_db[0]['id']);
            
            //SEND VALIDATION CODE
            $email = new Email($data['email'], "forgotten_password_email", $link);
            return json_encode($email->send());
        }else{
            return false;
        }
    }