<?php
/**
 * Created by Angel Leonardo Bianco on 07/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */


// Check Data
include ("../cbr/funcs.php");
$link = conectDDBB();
$sponsor = $_POST["sponsor"];
$name = $_POST["name"];
$username = $_POST["username2"];
$pass = $_POST["pass1"];
$email = $_POST["email"];
$level = 0;


$sql = "SELECT * FROM  mlm_users_test WHERE   userName = '" . $sponsor . "'";
$result = mysqli_query($link, $sql);
$extraido1 = mysqli_fetch_array($result);
$sponsorID =  $extraido1["userID"];


$IV = md5( rand(0,1000) );
$hash = md5( rand(0,1000) );

$sql = "INSERT INTO mlm_users_test (userName, name, email, password, IV, level, referal, hash) VALUES ('".$username."', '".$name."', '".$email."', '".$pass."', '".$IV."', '".$level."', '".$sponsorID."', '".$hash."')";

mysqli_query($link, $sql);

$to      = $email; // Send email to our user
$subject = 'Activación de Cuenta - MLMGestión'; // Give the email a subject
$message = '
 
¡Gracias por formar parte de nuestro equipo!
Su cuenta ha sido creada, con los siguientes datos: 
------------------------
Username: '.$username.'
Password: '.$pass.'
------------------------
 
Por favor, haga click en le siguiente enlace para activar su cuenta:

http://panel-creator.mlmgestion.com/activate.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link

$headers = 'From:noreply@mlmgestion.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
header( "refresh:0;url=../login.php" );


?>