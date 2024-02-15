<?php
$servername = "db";
$username = "root";
$password = "password";
$dbname = "wp_bbcap23_15";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>