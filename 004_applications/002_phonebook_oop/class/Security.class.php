<?php
class Security
{

    /**
     * 
     * Method for encrypting and decrypting data sent to cookies and session.
     * 
     * @param string $string Define which string you want encrypted or decrypted
     * @param string $action Define do you want encryption with "encrypt" value or decryption with "decrypt" value. Default action is encryption.
     * @return string It returnes encrypted or decrypted string, base on action provided
     * 
     */

    public static function encrypt_decrypt($string, $action = "encrypt")
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This_is_my_secret_key!';
        $secret_iv = 'Welcome_to_the_programming!';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } elseif ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    /**
     * 
     * Method for encrypting sensitive data sent to the database or somewhere else.
     * This data can't be decrypted because we use triple md5 with custom salt for all files.
     * @param string $data Data to be encrypted
     * @return string It returns encrypted data
     */
    public static function hash($data)
    {
        $output = md5(md5(md5($data . SALT) . SALT) . SALT);
        return $output;
    }

    /**
     * 
     * Method for encrypting password which are then saved to the database or somewhere else.
     * @param string $password Password which we will encrypt with password_hash function in PHP. We add SALT on both sides of the password.
     * @return string It return hashed password using BCrypt algorithm.
     * 
     */
    public static function hash_password($password)
    {
        $password = SALT . $password . SALT;
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     *
     *  Method for checking naked and encrypted password. Naked password will come from the user, and encrypted password will come from the database or other place where it is saved.
     * @param string $password Naked password which comes from the user.
     * @param string $encrypted_password Already hashed password from the database or somewhere else
     * @return bool If we have a match, we return true, else we return false
     * 
     */
    public static function verify_password($password, $encrypted_password)
    {
        $password = SALT . $password . SALT;
        if (password_verify($password, $encrypted_password)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * Method for escaping characters which are dangerous for the database. We use real_escape_string method from the mysqli.
     * @param string $string String which needs to be escaped before saving it into the database.
     * @return string It returns escaped string.
     * 
     */
    public static function escape($string)
    {
        global $connection;
        return $connection->real_escape_string($string);
    }

    /**
     * 
     * Method for preventing XSS attacks using htmlspecialchars in PHP.
     * @param string $string String which will be cleaned before saved or showed on the website
     * @return string It returns cleaned string.
     */
    public static function clean($string)
    {
        $output = htmlspecialchars($string);
        return $output;
    }
}
