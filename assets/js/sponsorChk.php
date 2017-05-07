<?php
/**
 * Created by Angel Leonardo Bianco on 06/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */


$host = "localhost";
$userDDBB = "root";
$passDDBB = "";
$link = mysqli_connect($host, $userDDBB, $passDDBB);
mysqli_select_db($link, "mlm");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente



if(isset($_POST["username"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $username = $_POST["username"];

    $sql = "SELECT * FROM  mlm_users_test WHERE   userName = '" . $username . "'";


    $result = mysqli_query($link,$sql);

    $extraido1 = mysqli_fetch_array($result);

    if($extraido1!=0)
    {
        echo "<span style='color:green;'>Sponsor existente</span>"; // TODO agregar un campo hidden que sedebe comprobar para poder registrarse
    }
    else
    {
        echo "<span style='color:red;'>El sponsor no existe</span>";
    }

}
mysqli_close($link);

?>