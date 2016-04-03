<?php
$servername = "localhost";
$dbname = "1231648_name";
$username = "student";
$password = "student";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>