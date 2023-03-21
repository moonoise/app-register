<?php
namespace App;

class PasswordHash 
{
    public function create_password_hash($strPassword, $numAlgo = 1, $arrOptions = array())
    {
        if (function_exists('password_hash')) {
            // php >= 5.5
            $hash = password_hash($strPassword, $numAlgo, $arrOptions);
        } else {
            $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
            $salt = base64_encode($salt);
            $salt = str_replace('+', '.', $salt);
            $hash = crypt($strPassword, '$2y$10$' . $salt . '$');
        }
        return $hash;
    }

    public function verify_password_hash($strPassword, $strHash)
    {
        if (function_exists('password_verify')) {
            // php >= 5.5
            $boolReturn = password_verify($strPassword, $strHash);
        } else {
            $strHash2 = crypt($strPassword, $strHash);
            $boolReturn = $strHash == $strHash2;
        }
        return $boolReturn;
    }
}




// Test
// $strHash = create_password_hash("secret", PASSWORD_DEFAULT);
// echo $strHash . "\n";
// if (verify_password_hash('secret', $strHash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }