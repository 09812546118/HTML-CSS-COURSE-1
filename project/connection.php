<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "databases";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
