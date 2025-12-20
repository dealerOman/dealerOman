<?php
/*
  NOTE: MySQL connection file
  Used by all PHP pages that access the database
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dealeroman_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>