<?php
/**
 * Created by Angel Leonardo Bianco on 01/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */

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


}

function loginChk($user, $pass)
{

    $sql = "SELECT COUNT(*) AS num FROM     mlm_users_test WHERE    userName = '".$user."'";

   echo $sql;
}

?>
