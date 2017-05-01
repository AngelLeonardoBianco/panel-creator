<?php
/**
 * Created by Angel Leonardo Bianco on 01/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */

// Check user, pass and level
include ("../cbr/funcs.php");
sessionChk();
$user = $_POST["user"];
$pass = $_POST["pass"];


loginChk($user, $pass);


?>
<h1>hllo</h1>
