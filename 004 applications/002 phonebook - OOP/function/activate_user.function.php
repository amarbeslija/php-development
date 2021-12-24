<?php
/**
 * 
 * Function for updating user status
 * @param array $data with user id
 * @return string It returns json encoded array 
 */
function activate_user($data){
    $user = new User();
    $data_from_db = $user->get_data($data['id']);

    if ($data_from_db[0]['validation_code'] == $data['token']) {
        $status = [
            "status" => "1"
        ];
        //Send welcome email
        $email = new Email($data_from_db[0]['email'], "welcome_email", "");
        $email->send();
        
        return $user->change_data($status, $data['id']);
            
    }
}