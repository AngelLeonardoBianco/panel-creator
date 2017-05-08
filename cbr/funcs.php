<?php
/**
 * Created by Angel Leonardo Bianco on 01/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */

$key_size = 32; // 256 bits
$encryption_key = openssl_random_pseudo_bytes($key_size, $strong); // $strong will be true if the key is crypto safe

/////////////////////////////////////////////////////////////////////////////////////////
/// Conect Data Base
/////////////////////////////////////////////////////////////////////////////////////////
function conectDDBB()
{

    require "../config/BBDDConfig.php";

    $link = mysqli_connect($host, $userDDBB, $passDDBB);

    mysqli_select_db($link, "mlm");

    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

    return $link;
}
/////////////////////////////////////////////////////////////////////////////////////////
/// Conect Data Base
/////////////////////////////////////////////////////////////////////////////////////////
function conectDDBB2()
{

    require "../../config/BBDDConfig.php";

    $link = mysqli_connect($host, $userDDBB, $passDDBB);

    mysqli_select_db($link, "mlm");

    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

    return $link;
}
/////////////////////////////////////////////////////////////////////////////////////////
/// Conect Data Base
/////////////////////////////////////////////////////////////////////////////////////////
function conectDDBB3()
{

    require "config/BBDDConfig.php";

    $link = mysqli_connect($host, $userDDBB, $passDDBB);

    mysqli_select_db($link, "mlm");

    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

    return $link;
}
/////////////////////////////////////////////////////////////////////////////////////////
/// Show Data retireved in a query
/////////////////////////////////////////////////////////////////////////////////////////
function mostrarDatos($resultados)
{

    if ($resultados != NULL) {

        echo "- Nombre: " . $resultados['userID'] . "<br/> ";
        echo "- Edad: " . $resultados['userName'] . "<br/>";
        echo "==========================================";
    } else {
        echo "<br/>No hay más datos: <br/>" . $resultados;
    }

}

/////////////////////////////////////////////////////////////////////////////////////////
/// Check sesion status
/////////////////////////////////////////////////////////////////////////////////////////

function sessionChk()
{
    // here is the implementation, including the session functions
    include("../config/BBDDConfig.php");
    // Create connection
    $conn = new mysqli($host, $userDDBB, $passDDBB);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


/////////////////////////////////////////////////////////////////////////////////////////
/// Check login function -TODO only aproach, we have to make register first, that will save our data and encryt it.
/////////////////////////////////////////////////////////////////////////////////////////

function loginChk($user, $pass, $conn)
{
    conectDDBB();
    $sql = "SELECT * FROM  mlm_users_test WHERE   userName = '" . $user . "'";

    $link = mysqli_connect("127.0.0.1", "root", "");

    mysqli_select_db($link, "mlm");

    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

    $result = mysqli_query($link, "SELECT * FROM mlm_users_test");

    $extraido1 = mysqli_fetch_array($result);

    mostrarDatos($extraido1);

    $extraido2 = mysqli_fetch_array($result);

    mostrarDatos($extraido2);

    $extraido3 = mysqli_fetch_array($result);

    mostrarDatos($extraido3);

    $extraido4 = mysqli_fetch_array($result);

    mostrarDatos($extraido4);

    $extraido5 = mysqli_fetch_array($result);

    mostrarDatos($extraido5);

    $extraido6 = mysqli_fetch_array($result);

    mostrarDatos($extraido6);

    mysqli_free_result($result);

    mysqli_close($link);
}



///////////////////////////////////////////////////////////////////////////////////////////////
/// Encrypt
///////////////////////////////////////////////////////////////////////////////////////////////
function pkcs7_pad($data, $size)
{
$length = $size - strlen($data) % $size;
return $data . str_repeat(chr($length), $length);
}

function encryptA ($dataToEncript, $encryption_key, $IV)
{
return openssl_encrypt(
pkcs7_pad($dataToEncript, 16), // padded data
'AES-256-CBC',        // cipher and mode
$encryption_key,      // secret key
0,                    // options (not used)
$IV                   // initialisation vector
);
};


///////////////////////////////////////////////////////////////////////////////////////////////
/// Dencrypt
///////////////////////////////////////////////////////////////////////////////////////////////
function pkcs7_unpad($data)
{
    return substr($data, 0, -ord($data[strlen($data) - 1]));
}

function decryptA($data, $enc, $IV)
{
    return pkcs7_unpad(openssl_decrypt(
        $data,
        'AES-256-CBC',
        $enc,
        0,
        $IV
    ));
};


?>