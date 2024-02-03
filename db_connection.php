<?php
    $servername = "172.20.0.4";
    $port = 3306;
    $username = "root";
    $password = "password";
    $dbname = "WEBPRO_ESTKIT1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>