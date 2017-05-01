<?php
/**
 * Created by Angel Leonardo Bianco on 01/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */
// Define DDBB connection data
$host = "localhost";
$userDDBB = "root";
$passDDBB = "";

// Create connection
$conn = new mysqli($host, $userDDBB, $passDDBB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
