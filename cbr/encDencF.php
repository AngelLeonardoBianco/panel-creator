<?php
/**
* Created by Angel Leonardo Bianco on 01/05/2017
* for Traftecno
* angel.leonardo.bianco@gmail.com
*/


//// TODO include encriptation decryt functions here, we neeed three, one for encryptsimple data with openssl, one for decript data with opensll, and last one for encrytop the password



////////////////////////////////////////////////////////////////////////////////////////////
/// VARS
////////////////////////////////////////////////////////////////////////////////////////////

$key_size = 32;
// 256 bits
$encryption_key = openssl_random_pseudo_bytes($key_size, $strong);
// $strong will be true if the key is crypto safe
$iv_size = 16;
// 128 bits
$iv = openssl_random_pseudo_bytes($iv_size, $strong);

////////////////////////////////////////////////////////////////////////////////////////////
/// Encrypt Unit
////////////////////////////////////////////////////////////////////////////////////////////
function pkcs7_pad($data, $size)
{
    $length = $size - strlen($data) % $size;
    return $data . str_repeat(chr($length), $length);
}

$name = 'Jack';
$enc_name = openssl_encrypt(
    pkcs7_pad($name, 16), // padded data
    'AES-256-CBC',        // cipher and mode
    $encryption_key,      // secret key
    0,                    // options (not used)
    $iv                   // initialisation vector
);

////////////////////////////////////////////////////////////////////////////////////////////
/// Decrypt Unit
////////////////////////////////////////////////////////////////////////////////////////////
function pkcs7_unpad($data)
{
    return substr($data, 0, -ord($data[strlen($data) - 1]));
}

$row = $result->fetch(PDO::FETCH_ASSOC); // read from database result
// $enc_name = base64_decode($row['Name']);
// $enc_name = hex2bin($row['Name']);
$enc_name = $row['Name'];
// $iv = base64_decode($row['IV']);
// $iv = hex2bin($row['IV']);
$iv = $row['IV'];

$name = pkcs7_unpad(openssl_decrypt(
    $enc_name,
    'AES-256-CBC',
    $encryption_key,
    0,
    $iv
));

////////////////////////////////////////////////////////////////////////////////
/// Pass Encrypt
////////////////////////////////////////////////////////////////////////////////
$password = 'my password';
$random = openssl_random_pseudo_bytes(18);
$salt = sprintf('$2y$%02d$%s',
    13, // 2^n cost factor
    substr(strtr(base64_encode($random), '+', '.'), 0, 22)
);

$hash = crypt($password, $salt);
////////////////////////////////////////////////////////////////////////////////

$given_password = $_POST['password']; // the submitted password
$db_hash = $row['Password']; // field with the password hash

$given_hash = crypt($given_password, $db_hash);

if (isEqual($given_hash, $db_hash)) {
    // user password verified
}

// constant time string compare
function isEqual($str1, $str2)
{
    $n1 = strlen($str1);
    if (strlen($str2) != $n1) {
        return false;
    }
    for ($i = 0, $diff = 0; $i != $n1; ++$i) {
        $diff |= ord($str1[$i]) ^ ord($str2[$i]);
    }
    return !$diff;
}
?>