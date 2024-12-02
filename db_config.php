<?php
// db_config.php

//connection with database

$servername = "localhost";
$username = "root";
$password = ""; // can change sql password for other hosting website
$dbname = "f cinema";

// establishing connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
