<?php
    $servername = "localhost";
    $port = 3306;
    $username = "bbcap23_15";
    $password = "96zAQSAG";
    $dbname = "wp_bbcap23_15";

    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>